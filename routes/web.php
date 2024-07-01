<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return ['foo' => 'bar'];
});

Route::get('/contact', function () {
    return view('home');
});

Route::get('/jobs', function () {
    return Job::with('employer')->paginate(2);
});

Route::post('/jobs', function () {

    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);


    $job = Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);

    
    return $job;
    
});

Route::get('/jobs/{id}', function ($id) {
    
});

Route::get('/jobs/{id}', function ($id) {
    return Job::find($id);
});

