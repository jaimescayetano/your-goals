<?php

use App\Models\Goal;

use App\Http\Controllers\GoalsController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// create Goal
Route::get('/goals/create', [GoalsController::class, 'create'])->name('goals.create')->middleware('auth');;
// store Goal
Route::post('/goals/create', [GoalsController::class, 'store'])->middleware('auth');;

// index completed
Route::get('/goals/completed', [GoalsController::class, 'index'])->name('goals.completed')->middleware('auth');;

// update
Route::get('/goals/{id}', [GoalsController::class, 'edit'])->name('goals.edit')->middleware('auth');;

Route::put('/goals/{id}', [GoalsController::class, 'update'])->name('goals.update')->middleware('auth');;

// complete Goal
Route::get('/goals/{goal}/complete', [GoalsController::class, 'complete'])->name('goals.complete')->middleware('auth');;

// delete Goal
Route::delete('/goals/{goal}', [GoalsController::class, 'destroy'])->name('goals.destroy')->middleware('auth');
