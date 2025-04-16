<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
use Illuminate\Support\Facades\Validator;

class StudentClassController extends Controller
{
    function index(){
        $studentsClass = App\Models\StudentClass::join('student', 'id_student', '=', 'student.id')
        ->join('class', 'id_class', '=', 'class.id')
        ->join('subject', 'class.id_subject', '=', 'subject.id')
        ->select('student_class.*', 'class.time_start as class_time_start', 'subject.name as subject_name')
        ->get();
        return response()->json($studentsClass);
    }
    function getById($id){
        $studentsClass = App\Models\StudentClass::join('student', 'id_student', '=', 'student.id')
        ->join('class', 'id_class', '=', 'class.id')
        ->join('subject', 'class.id_subject', '=', 'subject.id')
        ->select('student_class.*', 'class.time_start as class_time_start', 'subject.name as subject_name')
        ->where("student_class.id", $id)->get();
        return response()->json($studentsClass);
    }
    function store(Request $request){
        $kq = App\Models\StudentClass::create($request->all());
        // Hoặc bạn có thể trả về ID nếu cần sử dụng ở nơi khác
        return response()->json($kq, 201);
    }
    function update($id, Request $request){
        $studentClass = App\Models\StudentClass::find($id);
        $studentClass->update($request->all());
        return response()->json([
            "message" => "successfully",
            "data" => $studentClass
        ], 201);
    }
}
