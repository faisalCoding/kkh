<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Section;

class EditSections extends Component
{
    public function render()
    {

        
        return view('livewire.edit-sections',
        [
            'sections' => Section::paginate(2)
        ]
    );
    }

    public function delete($id)
    {
             Section::find($id)->delete();
    }
}
