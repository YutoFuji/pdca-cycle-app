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

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Goalの一覧ページ
Route::get('/goals',[GoalController::class, 'index'])->name('goals.index')->middleware('auth');

//Goalの作成ページ
Route::get('/goals/create',[GoalController::class, 'create'])->name('goals.create')->middleware('auth');

//Goalの保存
ROute::post('/goals',[GoalController::class, 'store'])->name('goals.store')->middleware('auth');