<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/',  '\App\Http\Controllers\UserController@getLogin');
    Route::get('/login', '\App\Http\Controllers\UserController@getLogin')->name('login');
    Route::post('/login', '\App\Http\Controllers\UserController@postLogin');
});


Route::middleware('auth:web')->group(function () {
    
    // Route::get('/home', '\App\Http\Controllers\HomeController@getHome');
    Route::get('/user', '\App\Http\Controllers\HomeController@gettest');
    Route::post('/add_user', '\App\Http\Controllers\HomeController@add_user');
    Route::get('delete_user/{id}','\App\Http\Controllers\HomeController@delete_user');
    Route::get('edit_user/{id}','\App\Http\Controllers\HomeController@edit_user');
    Route::post('/save_changes', '\App\Http\Controllers\HomeController@update');
    Route::post('/save_changes_employee', '\App\Http\Controllers\HomeController@update_employee');

    Route::get('edit_employee/{id}', '\App\Http\Controllers\HomeController@edit_employee');
    Route::get('delete_employee/{id}', '\App\Http\Controllers\HomeController@delete_employee');


    Route::get('/home',function(){
        $times = DB::table('times')->first();  
        return view('home',compact('times'));
    });
    Route::get('/profile',function(){
        return view('profile');
    });
    Route::get('/project_list',function(){
        return view('project_list');
    });
    Route::get('/production',function(){
        return view('production');
    });
    Route::get('/dedicated_time',function(){
        return view('dedicated_time');
    });
    Route::get('/history_employees',function(){
        return view('history_employees');
    });
    Route::get('/new_employee',function(){
        return view('new_employee');
    });
    Route::get('/create_state',function(){
        return view('create_state');
    });
    Route::get('/list_tools',function(){
        return view('list_tools');
    });
    Route::get('/list_employees', '\App\Http\Controllers\HomeController@getAllEmployees');

    Route::get('/create_tool',function(){
        return view('create_tool');
    });
    


    Route::get('/password', '\App\Http\Controllers\HomeController@getChangePassword');
    Route::post('/password', '\App\Http\Controllers\HomeController@postChangePassword');

    Route::post('/add_emloyee', '\App\Http\Controllers\HomeController@postAddEmployee');
    Route::post('/add_time', '\App\Http\Controllers\HomeController@postAddtime');



    Route::get('/logout', '\App\Http\Controllers\UserController@getLogout');
});