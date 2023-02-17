<?php

namespace App\Http\Controllers\Admin;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $messages = Message::all();

        return view('admin.messages.index', [
            'messages' => $messages,
            'user' => $user,
        ]);
    }

    public function show(Message $message)
    {
        //
    }

    public function destroy(Message $message)
    {
        //
    }
}
