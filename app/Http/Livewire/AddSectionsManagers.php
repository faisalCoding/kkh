<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SectionManager;
use App\Models\Section;
use Illuminate\Support\Facades\Hash;


class AddSectionsManagers extends Component
{

    public $new_sections_managers_name = '000';
    public $new_section_manager_email = '111';
    public $new_section_manager_password = '';
    public $new_section_manager_section;

    public  $rules = [
        'new_sections_managers_name' => 'required|max:15|min:3',
        'new_section_manager_email' => 'max:25|min:5',
        'new_section_manager_password' => 'max:50|min:8',
    ];
    public  $messages = [
        'new_sections_managers_name.max' => '__("The name should not be more than 15 characters")',
        'new_sections_managers_name.required' => '__("Name is required")',
        'new_sections_managers_name.min' => '__("The name should not be less than 3 characters")',
    ];

    
    public function render()
    {
        return view('livewire.add-sections-managers');
    }

    public function addNewSectionManager()
    {       
            

            $created = SectionManager::create([
                'name' => $this->new_sections_managers_name,
                'email' => $this->new_section_manager_email,
                'password' => Hash::make($this->new_section_manager_password)
            ]);
            Section::find($this->new_section_manager_section)->update(
                [
                    'manager_id' => $created->id
                ]
            );
            
        
    }

    public function updated()
    {
        $this->validate();
    }
}
