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
Route::get('/problems/create', [ProblemController::class, 'create'])
    ->middleware('auth');

//manage
Route::get('/problems/manage', [ProblemController::class, 'manage'])
    ->middleware('auth');

//store problem datas
Route::post('/problems', [ProblemController::class, 'store'])
    ->middleware('auth');

//edit
Route::get('/problems/{id}/edit', [ProblemController::class, 'edit'])
    ->middleware('auth');

//update
Route::put('/problems/{id}', [ProblemController::class, 'update'])
    ->middleware('auth');

//update
Route::delete('/problems/{id}', [ProblemController::class, 'delete'])
    ->middleware('auth');


//single problems
Route::get('/problems/{id}', [ProblemController::class, 'show']);



//register
Route::get('/register', [UserController::class, 'create'])
    ->middleware('guest');

//create user
Route::post('/user', [UserController::class, 'store']);

//logout
Route::post('/logout', [UserController::class, 'logout'])
    ->middleware('auth');

//login form
Route::get('/login', [UserController::class, 'login'])->name('login')
    ->middleware('guest');

//login
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
