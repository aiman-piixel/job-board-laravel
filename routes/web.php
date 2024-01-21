<?php

use App\Http\Controllers\AppliedJobsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;




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

Route::get('/', function (){
    return redirect('jobs');
});

Route::resource('jobs', JobController::class)
    ->only(['index', 'show']);

Route::get('/login', function (){
    return redirect()->route('auth.create');
})->name('login');
Route::resource('auth', AuthController::class)
    ->only(['create', 'store']);

Route::delete('/logout', function (){
    return redirect()->route('auth.destroy');
})->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])
    ->name('auth.destroy');

Route::middleware('auth')->group(function() {
    Route::resource('job.application', JobApplicationController::class)
        ->only(['create', 'store', 'destroy']);
    Route::resource('applied-job', AppliedJobsController::class)
        ->only(['index', 'destroy']);
    Route:: resource('employer', EmployerController::class)
        ->only(['create', 'store']);
});