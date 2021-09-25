<?php

namespace App\Http\Livewire;

use App\Models\Section;
use Livewire\Component;

use App\Models\UserMessage;

class AdminMessageList extends Component
{

    public $filter = [];
    public $filter_section = 0;


    public function render()
    {
        if ($this->filter_section != 0) {
            $this->filter['section_id'] = $this->filter_section;
        }else{
            unset($this->filter['section_id']);
        }

        $user_messages = UserMessage::where($this->filter)->get();
        $sections = Section::get();

        return view('livewire.admin-message-list', [
            'user_messages' => $user_messages,
            'sections' => $sections
        ]);
    }

    public function reply($id, $case)
    {
        UserMessage::find($id)->update([
            'reply' => !$case
        ]);

        $this->dispatchBrowserEvent('reply', ['reply' => !$case]);
    }

    public function download($path)
    {
        return response()->download(storage_path('app/user_upload/' . $path));
    }

    public function filter_reply($filter_value){
        if (array_key_exists('reply',$this->filter) && $filter_value == $this->filter['reply']) {
            unset($this->filter['reply']);
        }else{
            $this->filter['reply'] = $filter_value;
        }
    }
}
