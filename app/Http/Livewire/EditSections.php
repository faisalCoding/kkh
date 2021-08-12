<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Section;
use App\Models\Service;

class EditSections extends Component
{
    public $section_id = '222';
    public $section_name = '111';
    public $section_manager_id = '333';
    public $section_description = '444';
    public $section_image_name = '444';
    public $new_service_name = '';
    public $section_order_by = 0;
    public $section_services = [];
    public $service_val =[];
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
        $this->section_order_by = $arr[4];
        $this->section_image_name = $arr[5];
        $this->popup = true;

        $this->section_services = Service::where('section_id',$arr[0])->get();
    
        $this->service_val = Service::select('name','order_by','id')->where('section_id',$arr[0])->get()->toArray();
       // dd($this->section_val);


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
                'order_by'        => $this->section_order_by,
                'image_name'        => $this->section_image_name
            ]
        );

        $this->popup = false;

    }

    public function updated()
    {
        $this->validate();

    }

    public function deleteService($service_id)
    {
        Service::find($service_id)->delete();
        $this->section_services = Service::where('section_id',$this->section_id)->get();
        $this->service_val = Service::select('name','order_by','id')->where('section_id',$this->section_id)->get()->toArray();

        
    }
    public function updateService($service_id,$key)
    {
        Service::find($service_id)->update([
            'name' => $this->service_val[$key]['name'],
            'order_by' => $this->service_val[$key]['order_by']
        ]);
        $this->section_services = Service::where('section_id',$this->section_id)->get();
        $this->service_val = Service::select('name','order_by','id')->where('section_id',$this->section_id)->get()->toArray();

        
    }

    public function addNewService()
    {
        
        Service::create([
            'name' => $this->new_service_name,
            'section_id' => $this->section_id
        ]);
        $this->section_services = Service::where('section_id',$this->section_id)->get();
        $this->service_val = Service::select('name','order_by','id')->where('section_id',$this->section_id)->get()->toArray();

        $this->new_service_name='';

        

    }
}
