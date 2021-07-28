<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AddUser extends Component
{
    public $new_user_name = '000';
    public $new_user_email = '111';
    public $new_user_password = '';
    public $new_user_phone;

    public  $rules = [
        'new_user_name' => 'required|max:15|min:3',
        'new_user_password' => 'required|max:50|min:8',
        'new_user_phone' => 'required|regex:/(05)[0-9]{8}/|unique:users,phone',
        'new_user_email' => 'required|string|email|max:255|unique:users,email',
    ];
    public  $messages = [
        'new_user_name.max' => 'يجب الا يزيد الاسم عن 15 حرفا',
        'new_user_name.required' => 'الاسم مطلوب',
        'new_user_email.email' => 'يجب كتابة الايميل بشكل صحيح',
        'new_user_email.required' => 'الايميل مطلوب',
        'new_user_email.unique' => 'الايميل مستخدم بالفعل',
        'new_user_phone.unique' => 'رقم الجوال مستخدم بالفعل',
        'new_user_phone.required' => 'رقم الجوال مطلوب',
        'new_user_password.min' => 'يجب الا تقل كلمة المرور عن 8 احرف',
    ];

    
    public function render()
    {
        return view('livewire.add-user');
    }

    public function addNewUser()
    {       
            

            $created = User::create([
                'name' => $this->new_user_name,
                'email' => $this->new_user_email,
                'phone' => $this->new_user_phone,
                'password' => Hash::make($this->new_user_password)
            ]);
            
            $this->emit('new_user_created');

        
    }

    public function updated()
    {
        $this->validate();
    }


}
