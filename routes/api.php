<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

route::post('contact','ContactController@store');
route::get('contact','ContactController@index');
route::get('contact/{priority}','ContactController@index');
route::get('email','ContactController@email');