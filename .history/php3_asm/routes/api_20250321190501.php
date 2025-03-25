<?php

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/students-class', [StudentClassController::class, 'index']);
Route::get('/student-class/{id}', [StudentClassController::class, 'getById']);

Route::get('/students', [StudentController::class, 'index']);
Route::get('/student/{id}', [StudentController::class, 'getById']);

Route::get('/types-class', [TypeClassController::class, 'index']);
Route::get('/type-class/{id}', [TypeClassController::class, 'getById']);

Route::get('/tutors', [TutorController::class, 'index']);
Route::get('/tutor/{id}', [TutorController::class, 'getById']);

Route::get('/subjects', [SubjectController::class, 'index']);
Route::get('/subject/{id}', [SubjectController::class, 'getById']);

Route::get('/degrees', [DegreeController::class, 'index']);
Route::get('/degree/{id}', [DegreeController::class, 'getById']);

Route::get('/classes', [ClassController::class, 'index']);
Route::get('/class/{id}', [ClassController::class, 'getById']);

Route::get('/tutor-bills', [TutorBillController::class, 'index']);
Route::get('/tutor-bill/{id}', [TutorBillController::class, 'getById']);

Route::post('/user/{id}', function ($id) {
    return response()->json(['id' => $id]);
});