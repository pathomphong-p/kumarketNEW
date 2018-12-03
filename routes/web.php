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

Route::get('/', function () {  //
    return redirect('/home');
});

Auth::routes(); //auth

Route::get('/home', 'HomeController@index')->name('home');//home
Route::get('admin/routes', 'HomeController@admin')->middleware('admin');//adminpage

Route::get('adminview', function(){  //adminview
    return view('adminview');
})->middleware('admin');

Route::resource('settime', 'TimeController')->middleware('admin');//settime

Route::get('print','PrintController@userview')->middleware('admin'); //print
Route::get('print/resetcome','PrintController@resetcome')->middleware('admin'); //print
Route::get('pdf','PDFController@pdfview')->middleware('admin');  //pdf


Route::get('add', function(){  //add
    return view('add');
})->middleware('admin');

Route::get('editform', function(){  //add
    return view('editform');
})->middleware('admin');

Route::get('/userview',['as'=>'times','uses'=>'TimeController@userview']);

//Route::get('/edit/search', ['as'=>'search','uses' => 'EditPageController@search'])->middleware('admin');
Route::get('/edit/{id}/del', ['as' => 'del','uses' => 'EditPageController@destroy'])->middleware('admin');
Route::resource('edit', 'EditPageController')->middleware('admin');

Route::get('/ban',['as'=>'ban','uses'=>'BanController@index'])->middleware('admin'); //ban
Route::get('/ban/{id}/SetUn',['as'=>'Unban','uses'=>'BanController@SetUnban'])->middleware('admin');
Route::get('/ban/{id}/set',['as'=>'Setban','uses'=>'BanController@Setban'])->middleware('admin');

Route::get('/userview',['as'=>'times','uses'=>'TimeController@userview'])->middleware('auth'); //userpage
Route::get('/user/{id}/SetUn',['as'=>'Uncome','uses'=>'TimeController@SetUncome'])->middleware('auth');
Route::get('/user/{id}/set',['as'=>'Setcome','uses'=>'TimeController@Setcome'])->middleware('auth');

Route::get('head', function(){  //add
    return view('header');
})->middleware('admin');

// Route::get('sort','EditPageController@MOSs')->middleware('admin'); //print