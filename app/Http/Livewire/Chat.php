<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Chat extends Component
{

    
    public $message_autenticate;
    public $message_recibed;
    public $messages = [];


    public function sendMessage($message, $user_emisor)
    {
        $user_emisor = \App\Models\User::whereId($user_emisor)->first();
        if(\Auth::check()){
            if(\Auth::user()->id === $user_emisor->id){
                array_push($this->messages, ['body' => $message, 'user_emisor' => $user_emisor]);
                $this->message_autenticate = $message;
            }else{
                $this->message_recibed = $message;
            }
        }
    }

    public function render()
    {
        return view('livewire.chat');
    }
}
