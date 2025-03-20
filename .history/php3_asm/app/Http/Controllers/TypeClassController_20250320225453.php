<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

class TypeClassController extends Controller
{
    function index(){
        $typeClass = App\Models\TypeClass::all();
        return response()->json($typeClass);
    }
    function getById($id){
        $typeClass = App\Models\TypeClass::find($id);
        return response()->json($typeClass);
    }
}
