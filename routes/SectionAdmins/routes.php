<?php

use Illuminate\Support\Facades\Route;

use  App\Models\SectionManager;



Route::prefix(LaravelLocalization::setLocale())->middleware([ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ])->group(function (){


## Manager Routes
Route::prefix('sectionManager')->name('section_manager.')->group(function(){



    config()->set('fortify.username','email');
    Route::middleware(['guest:sectionManager','PreventBackHistory'])->group(function(){
        Route::view('login', 'auth.section_admin.login')->name('login');
        Route::post('check',[App\Http\Controllers\SectionManager\SectionManagerController::class, 'check'])->name('check');
   });

    Route::middleware(['auth:sectionManager','PreventBackHistory'])->group(function(){
           Route::view('/dashboard','auth.section_admin.dashboard' , )->name('dashboard');
           
          Route::post('logout',[App\Http\Controllers\SectionManager\SectionManagerController::class,'logout'])->name('logout');
    });


});

});