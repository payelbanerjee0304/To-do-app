<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('todos/index', [MainController::class,'index'])->name('todos.index');
Route::get('todos/create', [MainController::class,'create'])->name('todos.create');
Route::post('todos/store', [MainController::class,'store'])->name('todos.store');
Route::get('todos/show/{id}', [MainController::class, 'show'])->name('todos.show');
Route::get('todos/{id}/edit', [MainController::class,'edit'])->name('todos.edit');
Route::post('todos/update', [MainController::class,'update'])->name('todos.update');
Route::get('todos/destroy/{id}', [MainController::class,'destroy'])->name('todos.destroy');
Route::get('todos/task/{id}', [MainController::class,'task'])->name('todos.task');
Route::post('todos/updatetask', [MainController::class,'updatetask'])->name('todos.updatetask');
