<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


// public data:
Route::post('/register',[UserController::class, "register"]);
//login route::
Route::post('/login',[UserController::class,"login"]);
//show all data:
Route::get('/students',[StudentController::class,"index"]);
//single show :
Route::get('/students/{id}',[StudentController::class, "show"]);
//search route:
Route::get('/students/search/{city}',[StudentController::class, "search"]);

//authentication needed or private dat:
Route::middleware('auth:sanctum')->group(function(){
//create data:
Route::post('/students',[StudentController::class, "store"]);
//update student:
Route::put('/students/{id}', [StudentController::class, "update"]);
// delete student:
 Route::delete('/students/{id}',[StudentController::class,"destroy"]);
//logout route:
Route::post('/logout',[UserController::class, "logout"]);
});
 


 //this route's are very important for our api. we can create any api form the api.php file which is in routes folder.
 // here we have web.php file.