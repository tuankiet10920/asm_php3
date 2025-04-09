<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

class DegreeController extends Controller
{
    function index()
    {
        $degrees = App\Models\Degree::with('tutor')->get();
        return response()->json($degrees);
    }
    function getById($id)
    {
        $degree = App\Models\Degree::find($id);
        return response()->json($degree);
    }
    function store(Request $request)
    {
        $kq = App\Models\Degree::create($request->all());
        // Hoặc bạn có thể trả về ID nếu cần sử dụng ở nơi khác
        return response()->json([
            'message' => 'Successfully!',
            'data' => $kq,
            'id' => $kq->id
        ], 201);
    }
}
