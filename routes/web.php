<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProblemController;



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
//all problems
Route::get('/', [ProblemController::class, 'index']);


//Show create form
Route::get('/problems/create', [ProblemController::class, 'create']);



//store problem datas
Route::post('/problems', [ProblemController::class, 'store']);

//edit
Route::get('/problems/{id}/edit', [ProblemController::class, 'edit']);

//update
Route::put('/problems/{id}', [ProblemController::class, 'update']);

//update
Route::delete('/problems/{id}', [ProblemController::class, 'delete']);

//single problems
Route::get('/problems/{id}', [ProblemController::class, 'show']);

//register
Route::get('/register', [UserController::class, 'create']);

//create user
Route::post('/user', [UserController::class, 'store']);

//logout
Route::post('/logout', [UserController::class, 'logout']);

//login form
Route::get('/login', [UserController::class, 'login']);

//login
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
