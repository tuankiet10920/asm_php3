<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

class StudentController extends Controller
{
    function index(){
        $students = App\Models\Student::all();
        return response()->json($students);
    }
    function getById($id){
        $student = App\Models\Student::find($id);
        return response()->json($student);
    }
}
