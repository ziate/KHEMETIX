<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Services\ConversationService;
use App\Services\GroqClientService;
use App\Services\GroqModelCatalogService;
use Illuminate\Http\Request;

class AiChatController extends Controller
{
    private const DEFAULT_MODEL = 'llama-3.3-70b-versatile';

    public function index(Request $request, GroqModelCatalogService $catalog)
    {
        $conversation = $this->resolveConversation($request);
        $messages = $conversation
            ? $conversation->messages()->orderBy('id')->get()
            : collect();

        return view('admin.ai_chat.index', [
            'models' => $catalog->models(),
            'messages' => $messages,
            'selectedModel' => $request->session()->get('admin_ai_chat_model', self::DEFAULT_MODEL),
        ]);
    }

    public function send(
        Request $request,
        GroqClientService $groq,
        ConversationService $conversationService,
        GroqModelCatalogService $catalog
    ) {
        $validated = $request->validate([
            'message' => ['required', 'string', 'max:4000'],
            'model' => ['nullable', 'string'],
        ]);

        $models = $catalog->models();
        $modelId = $validated['model'] ?? self::DEFAULT_MODEL;
        if (!array_key_exists($modelId, $models)) {
            $modelId = self::DEFAULT_MODEL;
        }

        $conversation = $this->resolveConversation($request, true, $conversationService);
        $conversationService->addMessage($conversation->id, 'user', $validated['message'], $modelId);

        $history = $conversation->messages()
            ->orderBy('id', 'desc')
            ->take(12)
            ->get()
            ->reverse()
            ->map(function ($message) {
                return [
                    'role' => $message->role,
                    'content' => $message->content,
                ];
            })
            ->values()
            ->all();

        $systemPrompt = implode("\n", [
            'You are Khemetix AI, a senior WordPress plugin architect and full-stack developer.',
            'Gather requirements, propose architecture, and deliver production-ready plugin plans.',
            'When asked, provide step-by-step build plans, file structures, and deliver a zip-ready checklist.',
            'Keep responses concise, structured, and focused on WordPress standards.',
        ]);

        $response = $groq->chat($modelId, array_merge([
            ['role' => 'system', 'content' => $systemPrompt],
        ], $history), [
            'temperature' => 0.3,
        ]);

        if (!($response['success'] ?? false)) {
            return response()->json([
                'success' => false,
                'message' => __('messages.ai_chat_error'),
                'details' => $response['error'] ?? null,
            ], 422);
        }

        $assistantMessage = $response['data']['choices'][0]['message']['content'] ?? '';
        if ($assistantMessage === '') {
            return response()->json([
                'success' => false,
                'message' => __('messages.ai_chat_error'),
            ], 422);
        }

        $conversationService->addMessage($conversation->id, 'assistant', $assistantMessage, $modelId);
        $request->session()->put('admin_ai_chat_model', $modelId);

        return response()->json([
            'success' => true,
            'message' => [
                'role' => 'assistant',
                'content' => $assistantMessage,
            ],
        ]);
    }

    private function resolveConversation(
        Request $request,
        bool $createIfMissing = false,
        ?ConversationService $conversationService = null
    ): ?Conversation {
        $conversationId = $request->session()->get('admin_ai_chat_conversation_id');
        $conversation = $conversationId
            ? Conversation::find($conversationId)
            : null;

        if (!$conversation && $createIfMissing && $conversationService) {
            $conversation = $conversationService->create($request->user()->id, null, 'Admin AI Chat');
            $request->session()->put('admin_ai_chat_conversation_id', $conversation->id);
        }

        return $conversation;
    }
}
