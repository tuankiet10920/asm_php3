<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

class SubjectController extends Controller
{
    function index(){
        $subjects = App\Models\Subject::all();
        return response()->json($subjects);
    }
    function getById($id){
        $subject = App\Models\Subject::find($id);
        return response()->json($subject);
    }
}
