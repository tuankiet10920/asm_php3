<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

class TutorBillController extends Controller
{
    function index(){
        $tutorBills = App\Models\TutorBill::all();
        return response()->json($tutorBills);
    }
    function getById($id){
        $tutorBill = App\Models\TutorBill::find($id);
        return response()->json($tutorBill);
    }
    function store(Request $request){
        $kq = App\Models\TutorBill::create($request->all());
        // Hoặc bạn có thể trả về ID nếu cần sử dụng ở nơi khác
        return response()->json([
            'message' => 'Successfully!',
            'data' => $kq,
            'id' => $kq->id
        ], 201);
    }
}
