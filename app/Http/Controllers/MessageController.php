<?php

namespace App\Http\Controllers;

use App\Events\MessageSentEvent;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');    
    }

    public function index()
    {
        return Message::with('user')->get();
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        // $user->load('messages');

        $message = $user->messages()->create([
            'message' => $request->input('message')
        ]);

        // se crea el evento a escuchar
        broadcast(new MessageSentEvent($message, $user))->toOthers();

        return [
            'message' => $message,
            'user' => $user 
        ];
    }
}
