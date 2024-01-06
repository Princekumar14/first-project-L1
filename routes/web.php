<?php

use App\Http\Controllers\CookiesController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
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

    Route::get('/songsInfo', 'showSongsInfo')->name('songsDetail');

    Route::get('/union', 'uniondata')->name('unionData');

    Route::get('/when', 'whendata')->name('whenData');

    Route::get('/chunk', 'chunkdata')->name('chunkData');

});



Route::view('addnewstudent', '/addstudent')->name('addnewstudent');

Route::get('get-all-session', function(){
    $session = session()->all();
    echo "<pre>";
    print_r($session); 
    echo "</pre>";
    // die;
});

Route::get('set-session', function (Request $request){
    $request->session()->put('user_name', 'Prince User');
    $request->session()->put('user_id', '123');
    // $request->session()->flash('status', 'Success !!');  // inteliphense error for flash()
    return redirect('get-all-session');
});

Route::get('destroy-session', function(){
    session()->forget(['user_name','user_id']);
    return redirect('get-all-session');
});


Route::controller(CookiesController::class)->group(function(){
    Route::get('/set-cookie', 'setCookie');
    Route::get('/get-cookie', 'getCookie');
    Route::get('/del-cookie', 'delCookie');
});