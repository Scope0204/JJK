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

Route::resource('introduce', 'IntroduceContoller');

Route::view('introduce/edit' , 'edit');
// Route::get('introduce/list', function(){
//     $introduces = \App\User::all();
//     return $introduces;
// });
 