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

Route::get('/', 'NewsContoller@index');

Auth::routes();

Route::feeds();

Route::get('/home', 'NewsContoller@index')->name('home');

Route::get('/verifyemail/{token}', 'EmailVerificationController@show')->middleware('guest');

Route::post('/verifyemail/{token}', 'EmailVerificationController@update')->middleware('guest');

Route::resource('news', 'NewsContoller',['except' => [ 'update', 'edit' ]]);
Route::get('/myposts', 'NewsContoller@showmyposts')->name('myposts');
Route::get('/printnews/{news}', 'NewsContoller@printnews')->name('printnews');

Route::get('/testpdf', function() {
    // This is test route to check if dompdf is working fine or not 
    $pdf = App::make('dompdf.wrapper');
    $pdf->loadHTML('<h1>Test</h1>');
    return $pdf->stream();
});