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
    function store(Request $request){
        $kq = App\Models\StudentClass::create($request->all());
        // Hoặc bạn có thể trả về ID nếu cần sử dụng ở nơi khác
        return response()->json([
            'message' => 'Successfully!',
            'data' => $kq,
            'id' => $kq->id
        ], 201);
    }
}
