<?php

namespace App\Http\Livewire;

use App\Models\Section;
use Livewire\Component;

use App\Models\SectionManager;
use Illuminate\Support\Facades\Hash;




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

    protected $listeners = [
        'new_section_manager_created' => '$refresh'


    ];


    public $rules = [
        'edit_section_manager_password' => ['required', 'string', 'min:8', 'confirmed']

    ];

    public  $messages = [
        'new_section_name.max' => 'يجب الا يزيد الاسم عن 20 حرفا',
        'new_section_name.required' => 'الاسم مطلوب',
        'new_scetion_manager.required' => 'يجب تحديد مدير القسم',
        'new_section_name.min' => 'يجب الا يقل الاسم عن 3 احرف',
        'file.max' => 'يجب الا يزيد حجم الملف عن 14 ميجا بايت',
        'file.mimes' => 'يجب ان يكون امتداد الصورة PNG  او  JPG',
        'new_section_description.max' => 'يجب الا يزيد الوصف عن 50 حرفا',
    ];


    public function render()
    {
        return view(
            'livewire.edit-sections-managers',
            [
                'sectionsManagers' => SectionManager::latest()->get()
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
        SectionManager::find($this->edit_section_manager_id)->delete();
        $this->popup = false;
    }


    public function update()
    {
        SectionManager::find($this->edit_section_manager_id)->update(
            [
                'name'       => $this->edit_section_manager_name,
                'email'       => $this->edit_section_manager_email,
            ]
        );
        if (isset($this->edit_section_manager_id)) {
            Section::where('manager_id', $this->edit_section_manager_id)->update(
                [
                    'manager_id'       => 0,

                ]
            );
        }

        Section::find($this->edit_section_manager_section)->update(
            [
                'manager_id'       => $this->edit_section_manager_id,

            ]
        );
        if ($this->change_pass) {
            SectionManager::find($this->edit_section_manager_id)->update(
                [
                    'password'       => Hash::make($this->edit_section_manager_password),
                ]
            );
        }

        $this->popup = false;
    }
}
