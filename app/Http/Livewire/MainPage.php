<?php

namespace App\Http\Livewire;

use App\Models\Section;
use App\Models\Service;
use App\Models\User;
use App\Models\UserMessage;
use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;

class MainPage extends Component
{
    use WithFileUploads;
    //________________________________________
    public $popup = false;
    public $popupToLogin = false;
    public $popupToCreate = false;

    //---------------------------------------
    public $searcheee = 'ابحث قسام';
    public $selector = 'ابحث قسام';
    public $services = [];
    public $section_id = '13';

    //---------------------------------------
    public $login_user_name;
    public $login_user_phone;
    public $service_id;
    public $new_user_contant_type_message;
    public $new_user_message;
    public $password;
    public $password_confirmation;
    public $file;
    //---------------------------------------
    public $new_user_name;
    public $new_user_phone;
    public $new_password;
    public $confirmation = false;
    //---------------------------------------

    public $success_send  = false;
    public $success_login = false;
    public $success_popup = false;


    //________________________________________


    //_________RULES________________________
    public $rules = [
        'password_confirmation' => ['required', 'same:password', 'max:555'],
        'new_user_name' => ['required', 'max:15', 'min:3'],
        'password' => ['required', 'max:50', 'min:8'],
        'new_user_phone' => ['required', 'regex:/(05)[0-9]{8}/'],
        'new_user_message' => ['required', 'max:555', 'min:3'],
        'service_id' => ['required', 'max:555'],
        'file' => ['file', 'max:25600','mimes:png,jpg,pdf']

    ];


    public $messages = [
        //__________password__________
        'password_confirmation.required' => 'الحقل مطلوب',
        'password.required'              => 'الحقل مطلوب',
        'password.min'          => 'يجب الا تقل كلمة المرور عن 8 احرف',
        //__________________________

        //__________name____________
        'new_user_name.max'      => 'يجب الا يزيد الاسم عن 15 حرفا',
        'new_user_name.required' => 'الاسم مطلوب',
        'new_user_name.min'      => 'يجب الا يقل الاسم عن 15 حرفا',
        //__________________________

        //__________phone___________
        'new_user_phone.unique'   => 'رقم الجوال مستخدم بالفعل',
        'new_user_phone.required' => 'رقم الجوال مطلوب',
        'new_user_phone.regex'    => 'رقم الجوال غير صحيح',
        //___________________________

        //__________message__________
        'new_user_message.max'      => 'يجب الا يزيد نص الرسالة عن 15 حرفا',
        'new_user_message.required' => 'نص الرسالة مطلوب',


        //__________file__________
        'file.max'      => 'حجم الملف كبير ',
        'file.mimes' => 'يجب ان يكون نوع الملف [pdf , png , jpg]',
        'file.uploaded' => 'هناك خطأ في التحميل ',

        //__________service_id______
        'service_id.required' => 'نص الرسالة مطلوب',


    ];

    //_________RULES________________________

    public function render()
    {



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



    public function submit()
    {

        if ($this->popupToLogin) {
            $this->validate([
                //__________password__________
                'password.required'              => 'الحقل مطلوب',
                'password.min'          => 'يجب الا تقل كلمة المرور عن 8 احرف',
                //__________________________

                //__________name____________
                'new_user_name.max'      => 'يجب الا يزيد الاسم عن 15 حرفا',
                'new_user_name.required' => 'الاسم مطلوب',
                'new_user_name.min'      => 'يجب الا يزيد الاسم عن 15 حرفا',
                //__________________________

                //__________phone___________
                'new_user_phone.unique'   => 'رقم الجوال مستخدم بالفعل',
                'new_user_phone.required' => 'رقم الجوال مطلوب',
                'new_user_phone.regex'    => 'رقم الجوال غير صحيح',
                //___________________________
            ]);

            $user = User::where("phone", $this->new_user_phone)->get()[0];

            $credentials = [
                "phone" => $user->phone,
                'password' => $this->password
            ];
            if (Auth::attempt($credentials)) {
                try {
                    Auth::login($user);
                    $this->popupToLogin_false();
                    $this->popup_false();
                    $this->createMessage($user->id, $this->section_id, $this->new_user_message, $this->new_user_contant_type_message, $this->service_id);


                    $this->success_login = true;
                } catch (\Throwable $th) {
                }
            }
        } else {
            $this->validate([
                //__________password__________
                'password_confirmation.required' => 'الحقل مطلوب',
                'password.required'              => 'الحقل مطلوب',
                'password.min'          => 'يجب الا تقل كلمة المرور عن 8 احرف',
                //____________________________

                //__________name______________
                'new_user_name.max'      => 'يجب الا يزيد الاسم عن 15 حرفا',
                'new_user_name.required' => 'الاسم مطلوب',
                'new_user_name.max'      => 'يجب الا يزيد الاسم عن 15 حرفا',
                //____________________________

                //__________phone_____________
                'new_user_phone.unique'   => 'رقم الجوال مستخدم بالفعل',
                'new_user_phone.required' => 'رقم الجوال مطلوب',
                'new_user_phone.regex'    => 'رقم الجوال غير صحيح',
                //____________________________
            ]);

            if ($this->confirmation) {
                try {
                    $fakeEmail = new \Database\Factories\UserFactory;
                    $user = User::create([
                        'name' => $this->new_user_name,
                        'phone' => $this->new_user_phone,
                        'password' => Hash::make($this->password),
                        'email' => $fakeEmail->uniqemail(),
                    ]);
                    Auth::login($user);
                    $this->popupToCreate_false();
                    $this->popup_false();
                    $this->createMessage($user->id, $this->section_id, $this->new_user_message, $this->new_user_contant_type_message, $this->service_id);

                    $this->success_login = true;
                } catch (\Throwable $th) {
                }
            }
        }
    }



    //---------------------------------------
    public function popup_false()
    {
        $this->popup = false;
    }
    //---------------------------------------
    public function popupToLogin_false()
    {
        $this->popupToLogin = false;
    }
    //---------------------------------------
    public function popupToCreate_false()
    {
        $this->popupToCreate = false;
    }
    //---------------------------------------
    public function popupNotify_false()
    {
        $this->success_login = false;
        $this->success_popup = false;
        $this->popupToLogin = false;
        $this->success_send = false;
        $this->popupToCreate = false;
        $this->popup = false;
    }
    //---------------------------------------



    public function senMessage()
    {


        if (Auth::check()) {
            $this->validate([
                'new_user_contant_type_message' => ['required'],
                'new_user_message' => ['required', 'max:555', 'min:3'],
                'service_id' => ['required', 'max:555'],
            ]);
            $this->createMessage(Auth::user()->id, $this->section_id, $this->new_user_message, $this->new_user_contant_type_message, $this->service_id);
        } else {
            $this->validate([
                'new_user_contant_type_message' => ['required'],
                'new_user_name' => ['required', 'max:15', 'min:3'],
                'new_user_phone' => ['required', 'regex:/(05)[0-9]{8}/'],
                'new_user_message' => ['required', 'max:555', 'min:3'],
                'service_id' => ['required', 'max:555'],
            ]);
            if (User::where('phone', '=', $this->new_user_phone)->exists()) {
                $this->popup = false;
                $this->popupToLogin = true;
                $this->login_user_name = User::select(['name'])->where('phone', '=',  $this->new_user_phone)->get()[0]['name'];
            } else {
                $this->popup = false;
                $this->popupToCreate = true;
            }
        }
    }

    public function createMessage($user_id, $section_id, $message, $contant_type, $service_id)
    {


        try {
            $user_message = UserMessage::create([
                'user_id'      => $user_id,
                'section_id'   => $section_id,
                'message'      => $message,
                'contant_type' => $contant_type,
                'service_id' => $service_id
            ]);

            if(!is_null($this->file)){
                $uploade_get_name = $this->saveFile();

                $user_message->update(['file_name' => $uploade_get_name]);
            }

            $this->success_send = true;
            $this->success_popup = true;
            $this->popup = false;
        } catch (\Throwable $th) {
        }
    }

    public function updated($propertyName)
    {
        $this->confirmePassword();
        $this->validateOnly($propertyName);
    }

    public function confirmePassword()
    {

        if ($this->password == $this->password_confirmation) {
            $this->confirmation = true;
        } else {
            $this->confirmation = false;
        }
    }

    public function submitLoguot()
    {
        Auth::logout();
    }

    public function saveFile()
    {
        $new_section_image_name = time() . '_' . $this->file->getClientOriginalName();
        $this->file->storeAs('user_upload', $new_section_image_name);
        return $new_section_image_name;
    }
}//____________________________________________________________________________
