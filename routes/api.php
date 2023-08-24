<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//http://places-api.test/api/hello
Route::get('/hello',function(){
    return "Hello World";
});

//http://places-api.test/api/goodbye/nama
Route::get('/goodbye/{name}',function($name){
    return "Goodbye ".$name;
});


Route::post('/info', function(Request $request){
    return 'Hello '.$request['name'] . ' you are '.$request['age'] . ' years old';
});

Route::post('/places', [PlaceController::class,'store']);

Route::get('/places', [PlaceController::class,'index']);

Route::get('/places/{id}', [PlaceController::class,'show']);

Route::put('/places/{id}', [PlaceController::class,'update']);

Route::delete('/places/{id}', [PlaceController::class,'delete']);