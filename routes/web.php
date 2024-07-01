<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::view('/','home');

Route::get('/jobs', [JobController::class,'index']);
Route::post('/jobs',[JobController::class, 'store']);
Route::get('/jobs/{job}',[JobController::class, 'show']);
Route::patch('/jobs/{job}',[JobController::class, 'update']);
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

