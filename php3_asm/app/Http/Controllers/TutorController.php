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
    function findTutors($keySearch)
    {
        $searchItem = '%' . $keySearch . '%';
        $tutors = App\Models\Tutor::where('name', 'like', $searchItem)->orWhere('id', 'like', $searchItem)->get();
        return response()->json($tutors, 200);
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
        $tutor = App\Models\Tutor::find($id);
        if ($tutor) {
            try {
                $tutor->delete();
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
                'message' => 'Không tồn tại giảng viên: ' . $id
            ], 404);
        }
    }
    public function update($id, Request $request)
    {
        $stutor = App\Models\Tutor::where('id', $id)->first();

        if ($stutor) {
            // Kiểm tra nếu có email và email không trùng với email của học viên hiện tại
            if ($request->has('email') && $request->email !== $stutor->email) {
                $existingTutor = App\Models\Tutor::where('email', $request->email)->first();
                if ($existingTutor) {
                    return response()->json([
                        'code' => 400,
                        'message' => 'Email đã tồn tại'
                    ], 400);
                }
            }

            try {
                $stutor->update($request->all());

                return response()->json([
                    'code' => '200',
                    'message' => 'Cập nhật thành công',
                    'id' => $id,
                    'data' => $stutor
                ], 200);
            } catch (\Exception $e) {
                return response()->json([
                    'code' => 500,
                    'message' => 'Lỗi khi cập nhật học viên ' . $e->getMessage()
                ], 500);
            }
        } else {
            return response()->json([
                'code' => 404,
                'message' => 'Không tìm thấy học viên với ID: ' . $id
            ], 404);
        }
    }
}
