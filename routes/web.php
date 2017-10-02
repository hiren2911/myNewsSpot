<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::feeds();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', function(){
    return redirect(route('news.index'));
})->name('home');

Route::get('/verifyemail/{token}', 'EmailVerificationController@show');

Route::post('/verifyemail/{token}', 'EmailVerificationController@update');

Route::resource('news', 'NewsContoller');
Route::get('/myposts', 'NewsContoller@showmyposts')->name('myposts');
Route::get('/printnews/{news}', 'NewsContoller@printnews')->name('printnews');

Route::get('testpdf', function() {
    // This is test route to check if dompdf is working fine or not 
    $pdf = App::make('dompdf.wrapper');
    $pdf->loadHTML('<h1>Test</h1>');
    return $pdf->stream();
});