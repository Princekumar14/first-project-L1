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


Route::get('/students', [StudentController::class, 'showStudents'])->name('allstudents');
Route::controller(StudentController::class)->group(function(){

    Route::get('/student/{id}', 'singleStudent')->name('view.student');
    
    Route::post('/add', 'addStudent')->name('addStudent');

    // Route::post('/update/{id}', 'updateStudent')->name('update.student');
    Route::put('/update/{id}', 'updateStudent')->name('update.student');

    Route::get('/updatepage/{id}', 'updatePage')->name('update.page');
    
    Route::get('/delete/{id}', 'deleteStudent')->name('delete.student');

});



Route::view('addnewstudent', '/addstudent')->name('addnewstudent');