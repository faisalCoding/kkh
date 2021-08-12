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
    public $new_section_order_by = 0;
    public $file;

    public  $rules = [
        'new_section_name' => 'required|max:20|min:3',
        'new_section_image_name' => 'max:5',
        'new_section_description' => 'max:50',
        'new_scetion_manager' => 'required',
        'file' => 'max:15000|mimes:png,jpg,',
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
                'order_by' => $this->new_section_order_by,
                'manager_id' => $this->new_scetion_manager
            ]);
            $this->emit('new_section_created');
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
