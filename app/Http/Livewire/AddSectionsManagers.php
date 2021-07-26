<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddSectionsManagers extends Component
{

    public $new_sections_managers_name = '000';
    public $new_section_manager_email = '111';
    public $new_section_manager_password = '222';
    
    public function render()
    {
        return view('livewire.add-sections-managers');
    }
}
