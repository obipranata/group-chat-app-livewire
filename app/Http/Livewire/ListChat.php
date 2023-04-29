<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Message;

class ListChat extends Component
{
    public $message;
    public $listChat;

    public function mount(){
        $this->listChat = Message::with('user')->get();
    }

    public function send(){
        if($this->message){
            Message::create([
                'user_id' => request()->session()->get('idPengguna'),
                'message' => $this->message
            ]);
    
            $this->message = '';
        }
    }

    public function getChat(){
        $this->listChat = Message::with('user')->get();
    }

    public function logout(){
        session()->flush();
        return redirect()->route("login");
    }

    public function render()
    {
        
        return view('livewire.list-chat');
    }
}
