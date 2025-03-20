<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

class DegreeController extends Controller
{
    function index(){
        $degrees = App\Models\Degree::all();
        return response()->json($degrees);
    }
    function getById($id){
        $degree = App\Models\Degree::find($id);
        return response()->json($degree);
    }
}
