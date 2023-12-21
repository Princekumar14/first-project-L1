<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('page/post', 'post')->name('mypost');

Route::get('/post/firstpost', function () {
    return view('firstpost');
});

Route::get('/test', function () {
    return view('about');
});

Route::redirect('/about', '/test');

Route::fallback(function(){
    return "<h1>Page not found</h1>";
});