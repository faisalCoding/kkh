<?php

namespace App\Http\Livewire;

use App\Models\Section;
use App\Models\Service;
use App\Models\User;
use App\Models\UserMessage;
use Livewire\Component;

use Illuminate\Support\Facades\Auth;

class MainPage extends Component
{
    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    public $popup = false;
    public $popupToLogin = false;
    public $popupToCreate = false;
    //---------------------------------------
    public $searcheee = 'ابحث قسام';
    public $selector = 'ابحث قسام';
    public $services = [];
    public $section_id;
    //---------------------------------------
    public $new_user_name;
    public $new_user_phone;
    public $service_id;
    public $new_user_contant_type_message;
    public $new_user_message;
    public $nameOfUser;
    public $password;
    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>


    public function render()
    {

        
        config()->set('fortify.username','phone');
        return view('livewire.main-page', [
            'sections' => Section::get(),
        ]);
    }

    public function cardBotton($section_id)
    {
        $this->section_id = $section_id;
        $this->services = Service::where('section_id', $section_id)->get();
        $this->popup = true;
    }

    public function submit() {

        $user = User::where("phone",$this->new_user_phone)->get()[0];

        $credentials=[
            "phone" => $user->phone,
            'password' => $this->password
        ];
        if (Auth::attempt($credentials)) {
            Auth::login($user);
            $this->popupToLogin_false();
            $this->popup_false();
            $this->createMessage($user->id, $this->section_id, $this->new_user_message ,$this->new_user_contant_type_message, $this->service_id);

        }
   
       

    }

    public function popup_false()
    {
        $this->popup = false;
    }//---------------------------------------
    public function popupToLogin_false()
    {
        $this->popupToLogin = false;
    }//---------------------------------------
    public function popupToCreate_false()
    {
        $this->popupToCreate = false;
    }//---------------------------------------



    public function senMessage()
    {
        if (Auth::check()) {
            $this->createMessage(Auth::user()->id, $this->section_id, $this->new_user_message ,$this->new_user_contant_type_message, $this->service_id);        
        }else{
            if (User::where('phone', '=', $this->new_user_phone)->exists()) {
                $this->popupToLogin =true;
                $this->nameOfUser = User::select(['name'])->where('phone','=',  $this->new_user_phone)->get()[0]['name'];
            } else {
                $this->popupToCreate =true;
            }
        }
    }

    public function createMessage($user_id, $section_id, $message,$contant_type, $service_id)
    {
        UserMessage::create([
            'user_id'      => $user_id,
            'section_id'   => $section_id,
            'message'      => $message,
            'contant_type' => $contant_type,
            'service_id' => $service_id
        ]);
    }
}//____________________________________________________________________________
