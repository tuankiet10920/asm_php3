<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

class StudentController extends Controller
{
    function index(){
        $students = App\Models\StudentClass::all();
        return response()->json($students);
    }
    function getById($id){
        $student = App\Models\StudentClass::find($id);
        return response()->json($student);
    }
}
