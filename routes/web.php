<?php

Route::get('/', function(){
    return view('auth.login');
});

Auth::routes(['register' => true]);

Route::group(['middleware' => 'auth'], function() {
    Route::get('home', 'HomeController@index')->name('home');
    // Names
    Route::resource('names', 'NameController');
    Route::post('names.file', 'NameController@file')->name('names.file');
    Route::get('names.download', 'NameController@excelDownload')->name('names.download');
});

Route::get('/logout', function() {
    Auth::logout();
    return Redirect::route('home');
})->name('logout');