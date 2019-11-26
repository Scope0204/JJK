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


Route::get('/introduce/list', function(){
    $introduces = \App\Member::all();
    return $introduces;
    // return 'aaa';
  
});
 
Route::resource('introduce', 'IntroduceContoller');

// Route::view('introduce/edit' , 'edit');
