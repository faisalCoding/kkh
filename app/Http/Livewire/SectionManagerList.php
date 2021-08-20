<?php

namespace App\Http\Livewire;

use App\Models\UserMessage;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class SectionManagerList extends Component
{
    public function render()
    {   
        
        return view('livewire.section-manager-list',[
            'users_messages' => UserMessage::where('section_id',Auth::user()->section()->get()->toArray()[0]['id'])->get()
        ]);
    }
}
