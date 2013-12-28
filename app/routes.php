<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('layouts.main');
});

Route::controller('session','SessionController');

Route::group(array('before' => 'auth'),function(){
    Route::get('/home', function(){
        return View::make('home');
    });
    Route::get('/navbar', function(){
        return View::make('partials.navbar');
    });
});

Route::get('/home', array('before' => 'auth', function(){
    return View::make('home');
}));


Route::get('/login',function(){
    return View::make('login');
});