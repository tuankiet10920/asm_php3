<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TypeClassController;
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

Route::get('/api/student', [StudentController::class, 'index']);
Route::get('/api/student/{id}', [StudentController::class, 'getById']);

Route::get('/api/type-class', [TypeClassController::class, 'index']);
Route::get('/api/type-class/{id}', [TypeClassController::class, 'getById']);