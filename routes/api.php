<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

route::resource('contact','ContactController');
//Api para obtener emails registrados
route::get('email','ContactController@email');