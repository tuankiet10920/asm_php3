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
use Illuminate\Http\Request;
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


