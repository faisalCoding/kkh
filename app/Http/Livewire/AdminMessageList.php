<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\UserMessage;

class AdminMessageList extends Component
{
    public function render()
    {

        $user_messages = UserMessage::filter([])->get();

        return view('livewire.admin-message-list',[
            'user_messages' => $user_messages
        ]);
    }

    public function reply($id,$case)
    {
        UserMessage::find($id)->update([
            'reply' => !$case
        ]);

        $this->dispatchBrowserEvent('reply', ['reply' => !$case]);

        
    }

    public function download($path)
    {
        return response()->download(storage_path('app/user_upload/'.$path));
    }
}
