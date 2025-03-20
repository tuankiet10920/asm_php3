<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\DegreeController;
use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TutorBillController;
use App\Http\Controllers\TutorController;
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
Route::get('/api/students-class', [StudentClassController::class, 'index']);
Route::get('/api/student-class/{id}', [StudentClassController::class, 'getById']);

Route::get('/api/students', [StudentController::class, 'index']);
Route::get('/api/student/{id}', [StudentController::class, 'getById']);

Route::get('/api/types-class', [TypeClassController::class, 'index']);
Route::get('/api/type-class/{id}', [TypeClassController::class, 'getById']);

Route::get('/api/tutors', [TutorController::class, 'index']);
Route::get('/api/tutor/{id}', [TutorController::class, 'getById']);

Route::get('/api/subjects', [SubjectController::class, 'index']);
Route::get('/api/subject/{id}', [SubjectController::class, 'getById']);

Route::get('/api/degrees', [DegreeController::class, 'index']);
Route::get('/api/degree/{id}', [DegreeController::class, 'getById']);

Route::get('/api/classes', [ClassController::class, 'index']);
Route::get('/api/class/{id}', [ClassController::class, 'getById']);

Route::get('/api/tutor-bills', [TutorBillController::class, 'index']);
Route::get('/api/tutor-bill/{id}', [TutorBillController::class, 'getById']);