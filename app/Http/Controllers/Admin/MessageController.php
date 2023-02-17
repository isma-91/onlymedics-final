<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function index()
    {
        $messages = Message::all();

        return view('admin.messages.index', [
            'messages' => $messages,
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
