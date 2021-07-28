<?php

namespace App\Http\Livewire;

use App\Models\Section;
use Livewire\Component;

use App\Models\SectionManager;
use Illuminate\Support\Facades\Hash;

use Laravel\Fortify\Rules\Password;



class EditSectionsManagers extends Component
{

    public $edit_section_manager_id = '000';
    public $edit_section_manager_name = '000';
    public $edit_section_manager_email = '111';
    public $edit_section_manager_password = '222';
    public $edit_section_manager_section = 13;
    public $edit_section_id = 13;
    public $change_pass = false;

    public $popup = false;


     
    
    public $rules = [
        'edit_section_manager_password' =>['required', 'string', 'min:8', 'confirmed']

    ];

    public  $messages = [
        'new_section_name.max' => '__("The name must not be more than 20 characters")',
        'new_section_name.required' => '__("Name is required")',
        'new_scetion_manager.required' => '__("The department manager must be selected")',
        'new_section_name.min' => '__("The name must not be less than 3 characters")',
        'file.max' => '__("The file size should not be more than 14MB")',
        'file.mimes' => '__("The image Type must be PNG or JPG")',
        'new_section_description.max' => '__("Description should not be more than 50 characters")',
    ];


    public function render()
    {
        return view('livewire.edit-sections-managers',
        [
            'sectionsManagers' => SectionManager::get()
        ]
    );
    }



    public function popup_false()
    {
        $this->popup = false;
    }

    public function initToUpdate($arr)
    {
        
        $this->edit_section_manager_id = $arr[0];
        $this->edit_section_manager_name = $arr[1];
        $this->edit_section_manager_email = $arr[2];
        $this->edit_section_manager_section = $arr[3];
        $this->popup = true;
        

        


    }

    public function delete()
    {
        SectionManager::find($this->edit_section_manager_id )->delete();
        $this->popup = false;

    }


    public function update()
    {
        SectionManager::find($this->edit_section_manager_id )->update(
            [
                'name'       => $this->edit_section_manager_name,
                'email'       => $this->edit_section_manager_email,            
            ]
        );
        Section::where('manager_id', $this->edit_section_manager_id  )->update(
            [
                'manager_id'       => 0,
          
            ]
        );

        Section::find($this->edit_section_manager_section )->update(
            [
                'manager_id'       => $this->edit_section_manager_id,
          
            ]
        );
        if ($this->change_pass) {
            SectionManager::find($this->edit_section_manager_id )->update(
                [
                    'password'       => Hash::make($this->edit_section_manager_password),
                ]
            );
        }

        $this->popup = false;

    }
}
