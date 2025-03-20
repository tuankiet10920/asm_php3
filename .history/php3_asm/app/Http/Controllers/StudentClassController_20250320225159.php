<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

class StudentClassController extends Controller
{
    function index(){
        $studentsClass = App\Models\StudentClass::all();
        return response()->json($studentsClass);
    }
    function getById($id){
        $studentsClass = App\Models\StudentClass::find($id);
        return response()->json($studentsClass);
    }
}
