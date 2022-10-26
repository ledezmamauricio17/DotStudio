<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\AsignmentController;

use Illuminate\Support\Facades\Artisan;

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
require __DIR__.'/auth.php';


Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('home.index');
Route::get('/loadTrainings', [TrainingController::class, 'index'])->middleware('auth')->name('training.index');
Route::get('/loadAsignments', [AsignmentController::class, 'index'])->middleware('auth')->name('asignment.index');
Route::get('/createTraining', [TrainingController::class, 'store'])->middleware('auth')->name('training.store');
Route::get('/createAsignment/', [AsignmentController::class, 'store'])->middleware('auth')->name('asignment.store');
Route::get('/deleteAsignment/', [AsignmentController::class, 'delete'])->middleware('auth')->name('asignment.delete');

