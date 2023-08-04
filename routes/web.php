<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Requests\SignUpRequest;

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


Route::get('/register', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'login']);
Route::get('/user', [UserController::class, 'getUser'])->middleware('AuthenticateUser');


Route::get('/create-task', [TaskController::class, 'createTask'])->middleware('AuthenticateUser');
Route::get('/list-tasks', [TaskController::class, 'listTasks'])->middleware('AuthenticateUser');



Route::get('/', function () {
    return redirect('/list-tasks');
});
Route::get('/list-tasks', [TaskController::class, 'index']);
