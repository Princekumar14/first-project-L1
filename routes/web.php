<?php

use App\CustomFacade\DateClass;
use App\Http\Controllers\CookiesController;
use App\Http\Controllers\CustomController;
use App\Http\Controllers\RequirementController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
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


Route::fallback(function(){
    return "<h1>Page not found</h1>";
});
Route::get('/test', function () {
    return view('test');
});

Route::middleware(['super-gaurd'])->group(function(){
    Route::redirect('/about', '/testing');
});

Route::get('/upload', function () {
    return view('upload');
});


Route::get('/students', [StudentController::class, 'showStudents'])->name('allstudents')->middleware('gaurd');
// Route::get('/students', [StudentController::class, 'showStudents'])->name('allstudents')->middleware('super-gaurd');
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

    Route::get('/cache', 'cacheStudents');

    // Route::get('/autocomplete', 'AutocompleteController@index');
    Route::post('/students/fetch', 'fetch')->name('student.fetch');

    Route::post('/upload', 'upload')->name('file.upload');

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

Route::get('no-access', function(){
    echo "you're not allowed to access this page.";
    die;
});

Route::get('login', function (Request $request){
    $request->session()->put('user_name', 'Prince User');
    $request->session()->put('user_id', '123');
    // return redirect('/students');
    echo "logged in";
    // die;
});
Route::get('logout', function(){
    session()->forget(['user_name','user_id']);
    echo "logged out";
    // die;
});


Route::controller(CustomController::class)->group(function(){
    Route::get('/doCustomThing', 'doCustomThing');
    
    Route::get('/facade-test-controller', 'dateFormatChanger');


});
Route::get('/facade-test', function(){
    $getDate = DateClass::dateFormatYMD('01/20/2024');
    return "Date Format Changer by Custom facade through Route : ".$getDate;
});







// Route::post('/addingRequirement', [RequirementController::class, 'addRequirement'])->middleware('hors');
// Route::controller(RequirementController::class)->group(function(){
//     Route::POST('/addingRequirement', 'addRequirement')->name('addRequirement');
//     // Route::post('/addingRequirement', 'addRequirement')->middleware('cors');

//     Route::get('/justcheck', 'justcheck');
// });



Route::get('/takecsrf',[RequirementController::class,'takecsrf']);
// Route::get('/takecsrf2',[RequirementController::class,'takecsrf'])->middleware('mycor');

Route::middleware(['mycor'])->group(function () {
    Route::post('/addingdata',[RequirementController::class,'addRequirement']);
    // Routes requiring CORS
    Route::get('/takecsrf2',[RequirementController::class,'takecsrf']);
});