<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AiChatController extends Controller
{
    public function index()
    {
        return view('admin.ai_chat.index');
    }
}
