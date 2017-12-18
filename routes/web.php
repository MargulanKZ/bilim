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

Route::get('/', 'Main\LecturesController@index')->name('home');
Route::get('/lecture/{id}','Main\LecturesController@show')->where('id','\d+')->name('lecture');
Route::get('/lecture/test/{id}','Main\QuestionsController@test')->where('id','\d+')->name('testing');
Route::post('/lecture/test/{id}','Main\QuestionsController@check');

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
    Route::group(['middleware'=>'admin', 'prefix'=>'admin'],function (){
        Route::get('/','Admin\AccountController@index')->name('admin');
        Route::get('/lect','Admin\LecturesController@index')->name('admin.lect');

        Route::get('/lect/add','Admin\LecturesController@add')->name('lect.add');
        Route::post('/lect/add', 'Admin\LecturesController@addRequestLecture');

        Route::get('/lect/edit/{id}','Admin\LecturesController@edit')
            ->where('id','\d+')
            ->name('lect.edit');
        Route::post('/lect/edit/{id}', 'Admin\LecturesController@editRequestLecture')->where('id','\d+');

        Route::delete('/lect/delete', 'Admin\LecturesController@delete')->name('lect.delete');
    });

});
