<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

class TutorController extends Controller
{
    function index(){
        $tutors = App\Models\Tutor::all();
        return response()->json($tutors);
    }
    function getById($id){
        $tutor = App\Models\Tutor::find($id);
        return response()->json($tutor);
    }
}
