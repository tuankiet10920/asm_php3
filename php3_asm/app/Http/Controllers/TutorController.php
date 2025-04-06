<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

class TutorController extends Controller
{
    function index()
    {
        $tutors = App\Models\Tutor::with('classes')->get();
        return response()->json($tutors);
    }
    function getById($id)
    {
        $tutor = App\Models\Tutor::find($id);
        return response()->json($tutor);
    }
    function store(Request $request)
    {
        $kq = App\Models\Tutor::create($request->all());
        // Hoặc bạn có thể trả về ID nếu cần sử dụng ở nơi khác
        return response()->json([
            'message' => 'Successfully!',
            'data' => $kq,
            'id' => $kq->id
        ], 201);
    }
    function delete($id)
    {
        $billDetail = App\Models\Tutor::find($id);
        if ($billDetail) {
            try {
                $billDetail->delete();
                return response()->json([
                    'code' => 200,
                    'message' => 'Successfully!'
                ], 200);
            } catch (\Exception $e) {
                return response()->json([
                    'code' => 500,
                    'message' => 'Không thể xóa giảng viên này!',
                    'message-code' => $e->getMessage()
                ]);
            }
        } else {
            return response()->json([
                'code' => 404,
                'message' => 'Student not found with ID: ' . $id
            ], 404);
        }
    }
}
