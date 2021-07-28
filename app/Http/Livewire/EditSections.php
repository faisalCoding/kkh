<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Section;

class EditSections extends Component
{
    public $section_id = '222';
    public $section_name = '111';
    public $section_manager_id = '333';
    public $section_description = '444';
    public $section_image_name = '444';
    public $popup = false;

    protected $listeners = [
        'new_section_created' => '$refresh'


    ];

    public $rules = [
        'section_name' =>'required|string|min:2|max:25',
        'section_description' =>'max:700|string',

    ];

    public  $messages = [
        'section_name.max' => 'يجب الا يزيد الاسم عن 25 حرفا',
         'section_name.min' => 'يجب الا يقل الاسم عن 2 من الاحرف',
        'section_name.required' => 'الاسم مطلوب',
        'section_description.max' => 'يجب الا يزيد الوصف عن 700 حرف',
    ];


    public function render()
    {


        return view(
            'livewire.edit-sections',
            [
                'sections' => Section::latest()->get()
            ]
        );
    }

    public function initToUpdate($arr)
    {
       

        $this->section_id = $arr[0];
        $this->section_name = $arr[1];
        $this->section_description = $arr[2];
        $this->section_manager_id = $arr[3];
        $this->section_image_name = $arr[4];
        $this->popup = true;


    }
    public function delete()
    {
        Section::find($this->section_id )->delete();
        $this->popup = false;

    }


    public function popup_false()
    {
        $this->popup = false;
    }
    public function update()
    {
        Section::find($this->section_id )->update(
            [
                'name'       => $this->section_name,
                'description'       => $this->section_description,
                'manager_id'        => $this->section_manager_id,
                'image_name'        => $this->section_image_name
            ]
        );

        $this->popup = false;

    }

    public function updated()
    {
        $this->validate();

    }
}
