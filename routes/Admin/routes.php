<?php

use Illuminate\Support\Facades\Route;

use  App\Models\Admin;



Route::prefix(LaravelLocalization::setLocale())->middleware([ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ])->group(function (){
## Manager Routes
Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
        config()->set('fortify.username','email');

        Route::view('/login','auth.admin.login' , )->name('login');
        Route::post('/check',[App\Http\Controllers\Admin\AdminController::class, 'check'])->name('check');
   });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        
        Route::view('/dashboard','auth.admin.dashboard' , )->name('dashboard');
          Route::post('/logout',[App\Http\Controllers\Admin\AdminController::class,'logout'])->name('logout');
          Route::get('/profile', [App\Http\Controllers\Admin\AdminController::class, 'show'])
          ->name('profile.show');
    });
    


});
});