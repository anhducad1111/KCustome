<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Message;

class AllMessage extends Component
{
    public $receiverId;

    public function render()
    {
        $messages = Message::where('user_id', auth()->id())->where('receiver_id', $this->receiverId)
            ->orWhere('receiver_id', auth()->id())->orWhere('user_id', $this->receiverId)
            ->get();
        return view('livewire.all-message', compact('messages'));
    }
}
