<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\Section;

class AddNewSection extends Component
{
    use WithFileUploads;

    public $new_section_name = '';
    public $new_section_image_name = 'bg_img.png';
    public $new_section_description = '';
    public $new_scetion_manager = 1;
    public $file;

    public  $rules = [
        'new_section_name' => 'required|max:20|min:3',
        'new_section_image_name' => 'max:5',
        'new_section_description' => 'max:50',
        'new_scetion_manager' => 'required',
        'file' => 'max:15000|mimes:png,jpg,',
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
        return view('livewire.add-new-section');
    }

    public function addNewSection()
    {
        if (1) {
            $this->saveFile();

            Section::create([
                'name' => $this->new_section_name,
                'image_name' => $this->new_section_image_name,
                'description' => $this->new_section_description,
                'manager_id' => $this->new_scetion_manager
            ]);
            
        }
    }
    public function updated()
    {
        $this->validate();
    }

    public function updatedPhoto()
    {
        $this->validate([
            'file' => 'image|max:15024|mimes:png,jpg',
        ]);
    }

    public function saveFile()
    {
        $this->new_section_image_name = time().'_'.$this->file->getClientOriginalName();
        $this->file->storeAs('sections_images' , $this->new_section_image_name);
    }
}
