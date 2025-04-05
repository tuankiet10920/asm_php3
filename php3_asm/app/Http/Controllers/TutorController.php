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
    function store(Request $request){
        $kq = App\Models\Tutor::create($request->all());
        // Hoặc bạn có thể trả về ID nếu cần sử dụng ở nơi khác
        return response()->json([
            'message' => 'Successfully!',
            'data' => $kq,
            'id' => $kq->id
        ], 201);
    }
}
