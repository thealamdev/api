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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


//public route for api:
// show all students data:

// Route::get('/students',[StudentController::class,"index"]);

Route::post('/register',[UserController::class, "register"]);
//logout route:
Route::post('/logout',[UserController::class, "logout"]);
Route::middleware('auth:sanctum')->group(function(){
    Route::get('/students',[StudentController::class,"index"]);
    //single show :
Route::get('/students/{id}',[StudentController::class, "show"]);
//create data:
Route::post('/students',[StudentController::class, "store"]);
//update student:
Route::put('/students/{id}', [StudentController::class, "update"]);
 // delete student:
 Route::delete('/students/{id}',[StudentController::class,"destroy"]);
 //search route:
 Route::get('/students/search/{city}',[StudentController::class, "search"]);
});
 


 //this route's are very important for our api. we can create any api form the api.php file which is in routes folder.
 // here we have web.php file.