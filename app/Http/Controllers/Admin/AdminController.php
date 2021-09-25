<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    function check(Request $request){
         //Validate Inputs
         $request->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required|min:5|max:30'
         ],[
             'email.exists'=>'This email is not exists in admins table'
         ]);

         $creds = $request->only('email','password');
         
         if( Auth::guard('admin')->attempt($creds) ){
             return redirect()->route('admin.dashboard', config('app.locale'));
         }else{
             return redirect()->route('admin.login', 'en')->with('fail','Incorrect credentials');
         }
    }

    function logout(){
        $locale = Session::get('applocale');
        Auth::guard('admin')->logout();
        Session::start();
        Session::put('applocale', $locale);
        return redirect('/');
    }

        public function show(Request $request)
    {


        return view('profile.show', [
            'request' => $request,
            'user' => $request->user(),
        ]);
    }
}
