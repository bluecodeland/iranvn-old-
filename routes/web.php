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

Route::get('/ch', function () {
    return view('chatlayout');
});

Route::get('/chat', function () {
    $v = new Verta(); //1396-02-02 15:32:08
        $v = verta(); //1396-02-02 15:32:08
        return view('chat')->with('fullname', $v);
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



