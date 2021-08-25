<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\UserMessage;

class AdminMessageList extends Component
{
    public function render()
    {
        return view('livewire.admin-message-list');
    }

    public function reply($id,$case)
    {
        UserMessage::find($id)->update([
            'reply' => !$case
        ]);

        $this->dispatchBrowserEvent('reply', ['reply' => !$case]);

        
    }
}
