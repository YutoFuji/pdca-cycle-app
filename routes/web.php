<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoalController;

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

Route::get('/', [GoalController::class, 'index'])->middleware('auth');

Auth::routes();

Route::get('goals/goal_done_list', [GoalController::class, "indexDone"])->name('to_done_list');

Route::resource('goals', GoalController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])->middleware('auth');

Route::put('goals/{id}/update_boolean_true', [GoalController::class, 'updateBooleanToTrue'])->middleware('auth')->name('goals.update_boolean_to_true');

Route::put('goals/{id}/update_boolean_false', [GoalController::class, 'updateBooleanToFalse'])->middleware('auth')->name('goals.update_boolean_to_false');
