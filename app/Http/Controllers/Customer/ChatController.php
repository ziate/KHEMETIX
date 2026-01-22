<?php
namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\GroqClientService;
use App\Services\ConversationService;
class ChatController extends Controller {
    public function index() { return view("customer.chat.index"); }
    public function send(Request $request, GroqClientService $groq, ConversationService $conv) {
        // Logic for sending message and getting AI response
        return response()->json(["success" => true]);
    }
}