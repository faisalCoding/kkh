<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditUser extends Component
{



    
    public $edit_user_id = '000';
    public $edit_user_name = '000';
    public $edit_user_email = '111';
    public $edit_user_password = '222';
    public $edit_user_phone = 13;
    public $change_pass = false;

    public $popup = false;

    protected $listeners = [
        'new_user_created' => '$refresh'


    ];
     
    
    public  $rules = [
        'edit_user_name' => 'required|max:15|min:3',
        'edit_user_password' => 'required|max:50|min:8',
        'edit_user_password' => 'required|regex:/(05)[0-9]{8}/|unique:users',
        'edit_user_email' => 'required|string|email|max:255|unique:users',
    ];
    public  $messages = [
        'edit_user_name.max' => 'يجب الا يزيد الاسم عن 15 حرفا',
        'edit_user_name.required' => 'الاسم مطلوب',
        'edit_user_email.email' => 'يجب كتابة الايميل بشكل صحيح',
        'edit_user_email.required' => 'الايميل مطلوب',
        'edit_user_email.unique' => 'الايميل مستخدم بالفعل',
        'edit_user_password.unique' => 'رقم الجوال مستخدم بالفعل',
        'edit_user_password.required' => 'رقم الجوال مطلوب',
        'edit_user_password.min' => 'يجب الا تقل كلمة المرور عن 8 احرف',
    ];



    public function render()
    {
        return view('livewire.edit-user',
        [
            'users' => User::latest()->get()
        ]
    );
    }


    public function popup_false()
    {
        $this->popup = false;
    }

    public function initToUpdate($arr)
    {
        
        $this->edit_user_id = $arr[0];
        $this->edit_user_name = $arr[1];
        $this->edit_user_email = $arr[2];
        $this->edit_user_phone = $arr[3];
        $this->popup = true;
        

        


    }

    public function delete()
    {
        User::find($this->edit_user_id )->delete();
        $this->popup = false;

    }


    public function update()
    {
        User::find($this->edit_user_id )->update(
            [
                'name'        => $this->edit_user_name,
                'email'       => $this->edit_user_email,            
                'phone'       => $this->edit_user_phone,            
            ]
        );

        if ($this->change_pass) {
            User::find($this->edit_user_id )->update(
                [
                    'password'       => Hash::make($this->edit_user_password),
                ]
            );
        }

        $this->popup = false;
        $this->edit_user_id = false;

    }
}
