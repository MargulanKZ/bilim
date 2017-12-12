<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>'guest'],function (){
    Route::get('/register','Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register','Auth\RegisterController@register');
    Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login','Auth\LoginController@login');
});

Route::group(['middleware'=>'auth'],function (){
    Route::get('/logout',function (){
        \Auth::logout();
        return redirect(route('login'));
    })->name('logout');
    Route::get('/my/account','AccountController@index')->name('account');

//    admin
    Route::group(['middleware'=>'admin'],function (){
        Route::get('/admin','Admin\AccountController@index')->name('admin');
        Route::get('/lect','Admin\LectureController@index')->name('admin.lect');
        Route::get('/lect/add','Admin\LectureController@add')->name('lect.add');
        Route::get('/lect/edit/[id]','Admin\LectureController@edit')
            ->where('id','\d+')
            ->name('lect.edit');
    });

});
