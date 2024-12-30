<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('posts',[PostController::class,"index"])->name("posts.index");
Route::post('posts',[PostController::class,"store"])->name("posts.store");



Route::get('/streaming', 'App\Http\Controllers\WebrtcStreamingController@index');
Route::get('/streaming/{streamId}', 'App\Http\Controllers\WebrtcStreamingController@consumer');
Route::post('/stream-offer', 'App\Http\Controllers\WebrtcStreamingController@makeStreamOffer');
Route::post('/stream-answer', 'App\Http\Controllers\WebrtcStreamingController@makeStreamAnswer');
