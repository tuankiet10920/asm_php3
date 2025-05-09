<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\DegreeController;
use App\Http\Controllers\MailController;
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

// sendmail
Route::post('/send-mail', [MailController::class, 'sendMail']);


Route::get('/students-class', [StudentClassController::class, 'index']);
Route::get('/student-class/{id}', [StudentClassController::class, 'getById']);
Route::post('/student-class', [StudentClassController::class, 'store']);
Route::put('/student-class/{id}', [StudentClassController::class, 'update']);

Route::get('/students', [StudentController::class, 'index']);
Route::get('/student/{id}', [StudentController::class, 'getById']);
Route::get('/class-student/{id}', [StudentController::class, 'getAllByStudentID']);
Route::get('/students/{keySearch}', [StudentController::class, 'findStudents']);
Route::post('/student', [StudentController::class, 'store']);
Route::post('/student/login', [StudentController::class, 'login']);
Route::put('/student/{id}', [StudentController::class, 'update']);
Route::delete('/student/{id}', [StudentController::class, 'delete']);

Route::get('/types-class', [TypeClassController::class, 'index']);
Route::get('/type-class/{id}', [TypeClassController::class, 'getById']);
Route::post('/type-class', [TypeClassController::class, 'store']);
Route::put('/type-class/{id}', [TypeClassController::class, 'update']);
Route::delete('/type-class/{id}', [TypeClassController::class, 'delete']);

Route::get('/tutors', [TutorController::class, 'index']);
Route::get('/tutor/{id}', [TutorController::class, 'getById']);
Route::post('/tutor/login', [TutorController::class, 'login']);
Route::get('/tutors/{keySearch}', [TutorController::class, 'findTutors']);
Route::post('/tutor', [TutorController::class, 'store']);
Route::put('/tutor/{id}', [TutorController::class, 'update']);
Route::delete('/tutor/{id}', [TutorController::class, 'delete']);

Route::get('/subjects', [SubjectController::class, 'index']);
Route::get('/subject/{id}', [SubjectController::class, 'getById']);
Route::post('/subject', [SubjectController::class, 'store']);
Route::put('/subject/{id}', [SubjectController::class, 'update']);
Route::delete('/subject/{id}', [SubjectController::class, 'delete']);

Route::get('/degrees', [DegreeController::class, 'index']);
Route::get('/degree/{id}', [DegreeController::class, 'getById']);
Route::post('/degree', [DegreeController::class, 'store']);
Route::put('/degree/{id}', [DegreeController::class, 'update']);
Route::delete('/degree/{id}', [DegreeController::class, 'delete']);
Route::get('/degrees/search/{key}', [DegreeController::class, 'search']);


Route::get('/classes', [ClassController::class, 'index']);
Route::get('/class/{id}', [ClassController::class, 'getById']);
Route::post('/class', [ClassController::class, 'store']);
Route::put('/class/{id}', [ClassController::class, 'update']);
Route::delete('/class/{id}', [ClassController::class, 'delete']);
Route::get('/classes/search/{key}', [ClassController::class, 'search']);

Route::get('/tutor-bills', [TutorBillController::class, 'index']);
Route::get('/tutor-bill/{id}', [TutorBillController::class, 'getById']);
Route::post('/tutor-bill', [TutorBillController::class, 'store']);
Route::put('/tutor-bill/{id}', [TutorBillController::class, 'update']);
Route::post('/tutor-bill', [TutorBillController::class, 'delete']);


Route::post('/product/{id}', function ($id) {
    return response()->json(['id' => $id]);
});