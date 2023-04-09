<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\PDCAController;


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

Route::resource('goals', GoalController::class)->except('show')->middleware('auth');

Route::put('goals/{id}/update_boolean', [GoalController::class, 'updateBoolean'])->middleware('auth')->name('goals.update_boolean');

Route::group(['prefix' => 'goals/{goal_id}', 'middleware' => 'auth'], function () {
    Route::resource('pdcas', PDCAController::class)->except('destroy')->middleware('auth');
});

