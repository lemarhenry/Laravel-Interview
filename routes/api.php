<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TodoController;
use App\Http\Controllers\Api\PassportAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
// Route::post ('register',[PassportAuthController::class,'register']);
// Route::post ('login',[PassportAuthController::class,'login']);s

Route::middleware('auth:api')->group(function () {
    Route::get('/todos',[TodoController::class,'AllTodos']);
    Route::post('/todo',[TodoController::class,'CreateTodo']);
    //routhe model binding
    Route::delete('/todo/{todo}',[TodoController::class,'DeleteTodo']);
    Route::put('/todo/complete/{todo}',[TodoController::class,'CompleteTodo']);
    Route::put('/todo/update/{todo}',[TodoController::class,'UpdateTodo']);

});
Route::group(['middleware' => ['cors', 'json.response']], function () {
    // Route::post('/login', [PassportAuthController::class, 'login']);
    // Route::post('/register', [ApiAuthController::class, 'register']);
    Route::post('/register', [PassportAuthController::class, 'register']);
    Route::post('/login', [PassportAuthController::class, 'login']);

});
