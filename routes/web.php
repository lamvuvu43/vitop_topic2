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
    return view('theme_master.layout.master');
});

//Route::get('/topic2', function () {
//   return view('theme_master.layout.master');
//});
//Route::get('/topic2/showtablettsp','TtspController@index');
//
//Route::post('/topic2/process_add','TtspController@store');
//
//Route::post('/topic2/process_update/{ttsp_id}','TtspController@update')->name('topic2.process_update');
//
//Route::get('/topic2/{ttsp_id}/edit','TtspController@edit');
//
//Route::get('/topic2/{ttsp_id}/delete','TtspController@destroy');
Route::resource('topic2','TtspController');

Route::get('/edit/', function (){
    return view('theme_master.form_edit');
});

Route::get('/add_sp',function (){
   return view('theme_master.add_ttsp');
});