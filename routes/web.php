<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', [UserController::class, 'register'])->middleware('ApiValidator:register');
Route::get('/login', [UserController::class, 'login'])->middleware('ApiValidator:login');
Route::get('/user', [UserController::class, 'getUser'])->middleware('AuthenticateUser', 'ApiValidator:getUser');


Route::get('/create-task', [TaskController::class, 'createTask'])->middleware('AuthenticateUser', 'ApiValidator:createTask');
Route::get('/list-tasks', [TaskController::class, 'listTasks'])->middleware('AuthenticateUser', 'ApiValidator:listTasks');
