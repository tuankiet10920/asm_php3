<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentClassController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/careers', function (){
    return view('careers');
});

Route::get('/about', function (){
    return view('about');
});

Route::get('/contact', function (){
    return view('contact');
});

Route::get('/dashboard', [AdminController::class, 'index']);


// api here
Route::get('/api/student-class', [StudentClassController::class, 'index']);
Route::get('/api/student-class/{id}', [StudentClassController::class, 'getById']);

