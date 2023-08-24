<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//ROUTE -> Hello World
Route::get('/hello',function(){
    return "Hello World";
});

//ROUTE -> View // resources -> views -> goodbye.blade.php
Route::get('/goodbye',function(){
    return view('goodbye');
});

//ROUTE -> Get name View // resources -> views -> makan.blade.php
Route::get('makan/{name}',function($name){
    return view('makan',["name"=>$name]);
});