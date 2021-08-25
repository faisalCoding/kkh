<?php

namespace App\Http\Livewire;

use App\Models\UserMessage;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class SectionManagerList extends Component


{
   public $user_section_id; 
   
   
   public function render()
    {   
        $this->dispatchBrowserEvent('reply', ['reply' => '']);
        $this->setSectionId();
        return view('livewire.section-manager-list',[
            'users_messages' => UserMessage::where('section_id',$this->user_section_id)->latest()->get()
        ]);
    }

    public function setSectionId()
    {
        if($this->user_section_id === null){
            $this->user_section_id = Auth::user()->section()->get()->toArray()[0]['id'];
        }
    }

    public function reply($id,$case)
    {
        UserMessage::find($id)->update([
            'reply' => !$case
        ]);

        $this->dispatchBrowserEvent('reply', ['reply' => !$case]);

        
    }
}
