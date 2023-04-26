<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;        

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


Route::get('/tasks', function () {
   $data=App\Models\Task::all(); 
        return view('tasks')->with('tasks',$data);
});

Route::post('/saveTask', 'App\Http\Controllers\TaskController@store');

Route::get('/markascompleted/{id}', 'App\Http\Controllers\TaskController@UpdateTaskAsCompleted');

Route::get('/markasnotcompleted/{id}', 'App\Http\Controllers\TaskController@UpdateTaskAsNotCompleted');

Route::get('/deletetask/{id}', 'App\Http\Controllers\TaskController@DeleteTask');

Route::get('/updatetask/{id}', 'App\Http\Controllers\TaskController@UpdateTaskView'); 

Route::post('/updatetasks', 'App\Http\Controllers\TaskController@UpdateTask');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');