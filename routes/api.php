<?php

use App\Http\Controllers\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\PassportAuthController;


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



//IF need login authentication put route in here
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Routes protected by auth:sanctum middleware
Route::middleware('jwt.auth')->group(function () {
    // Create
    Route::post('/places', [PlaceController::class,'store']);
    // Read
    // Update
    Route::put('/places/{id}', [PlaceController::class,'update']);
    // Delete
    Route::delete('/places/{id}', [PlaceController::class,'delete']);
    // Route::delete('/places',[PlaceController::class,'deleteAll']);


    //REVIEWS
    Route::post('/places/{placeId}/reviews',[ReviewController::class,'store']);
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

Route::get('/places', [PlaceController::class,'index']);
Route::get('/places/{id}', [PlaceController::class,'show']);

// Public routes (no authentication required)
Route::post('/register', [PassportAuthController::class, 'register']);
Route::post('/login', [PassportAuthController::class, 'login']);


