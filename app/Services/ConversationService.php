<?php
namespace App\Services;
use App\Models\Conversation;
use App\Models\Message;
class ConversationService {
    public function create($userId, $projectId = null, $title = "New Chat") {
        return Conversation::create(["user_id" => $userId, "project_id" => $projectId, "title" => $title]);
    }
    public function addMessage($conversationId, $role, $content, $modelId = null) {
        return Message::create(["conversation_id" => $conversationId, "role" => $role, "content" => $content, "model_id" => $modelId]);
    }
}