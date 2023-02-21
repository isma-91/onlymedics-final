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
        // $messages = Message::all();
        $messages = Message::where('user_id', Auth::id())->get();

        return view('admin.messages.index', [
            'messages' => $messages,
            'user' => $user,
        ]);
    }

    public function show(Message $message)
    {
        $user = Auth::user();
        if (Auth::id() !== $message->user_id) abort(401);
        return view('admin.messages.show', [
            'message' => $message,
            'user' => $user,
        ]);
    }

    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->route('admin.messages.index')->with('success_delete', $message);
    }
}
