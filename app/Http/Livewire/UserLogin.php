<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class UserLogin extends Component
{
    public $phone = '';
    public $password = '';
    public $showMessage = false;


    public $rules = [
        'phone' => 'required|regex:/(05)[0-9]{8}/|max:10|min:10',
        'password' => 'required|max:50|min:8'
    ];

    public $messages = [
        // phone message------------------------------------------
        'phone.required' => 'اسم المستخدم مطلوب',
        'phone.regex' => 'رقم الجوال غير صحيح',
        'phone.max' => 'يجب ان يكون رقم الجوال 10 ارقام',
        'phone.min' => 'يجب ان يكون رقم الجوال 10 ارقام',
        // password message------------------------------------------
        'password.required' => 'كلمة المرور مطلوبة',
        'password.min' => 'كلمة المرور لا تقل عن 8 احرف',
        'password.max' => 'كلمة المرور لا تزيد عن 50 حرفا'
    ];

    public function mount()
    { 
        if(Auth::check()){
            redirect('/dashboard');
        }
    }

    public function render()
    {
        return view('livewire.user-login');
    }

    public function check()
    {
        $this->validate();
        if ($this->validate()) {
            $user = User::where('phone', $this->phone)->get();

            if (count($user)) {
                if (Hash::check($this->password, $user[0]->password)) {

                    Auth::login($user[0]);

                    if(Auth::check()){
                        redirect('/dashboard');
                    }
                } else {
                    $this->showMessage = true;
                }
            }
        }
    }

    public function toggleShowMessage()
    {
        $this->showMessage = false;
    }

    public function updated()
    {
        $this->validate();
    }
}
