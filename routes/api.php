<?php

use Illuminate\Http\Request;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// soal
Route::resource('soal', 'Api\Soal\SoalController')->except([
    'create', 'edit'
]);

// user
Route::resource('user', 'Api\User\UserController')->except([
    'create', 'edit'
]);

//pengaturan
Route::get('peraturan', 'Api\Peraturan\PeraturanController@index');
Route::put('peraturan', 'Api\Peraturan\PeraturanController@update'); 