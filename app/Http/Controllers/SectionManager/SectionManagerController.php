<?php


namespace App\Http\Controllers\SectionManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SectionManager;
use Illuminate\Support\Facades\Auth;

class SectionManagerController extends Controller
{
    function check(Request $request){
         //Validate Inputs
         $request->validate([
            'email'=>'required|email|exists:section_managers,email',
            'password'=>'required|min:5|max:30'
         ],[
             'email.exists'=>'This email is not exists in section managers table'
         ]);

         $creds = $request->only('email','password');

         if( Auth::guard('sectionManager')->attempt($creds) ){
             return redirect()->route('section_manager.dashboard');
         }else{
             return redirect()->route('section_manager.login')->with('fail','Incorrect credentials');
         }
    }

    function logout(){
        Auth::guard('sectionManager')->logout();
        return redirect('/');
    }
}