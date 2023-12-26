<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('page/post', 'post')->name('mypost');

Route::get('/post/firstpost', function () {
    return view('firstpost');
});

Route::get('/testing', function () {
    return view('about');
});

Route::redirect('/about', '/testing');

Route::fallback(function(){
    return "<h1>Page not found</h1>";
});
Route::get('/test', function () {
    return view('test');
});

Route::get('/students', [StudentController::class, 'showStudents']);

Route::get('/student/{id}', [StudentController::class, 'singleStudent'])->name('view.user');