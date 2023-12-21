<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::view('/post', 'post');

Route::get('/post/firstpost', function () {
    return view('firstpost');
});