<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

class SubjectController extends Controller
{
    function index()
    {
        $subjects = App\Models\Subject::all();
        return response()->json($subjects);
    }
    function getById($id)
    {
        $subject = App\Models\Subject::find($id);
        return response()->json($subject);
    }
    function store(Request $request)
    {
        $kq = App\Models\Subject::create($request->all());
        // Hoặc bạn có thể trả về ID nếu cần sử dụng ở nơi khác
        return response()->json([
            'message' => 'Successfully!',
            'data' => $kq,
            'id' => $kq->id
        ], 201);
    }
    function update($id, Request $request)
    {
        $billDetail = App\Models\Subject::where('id', $id)->first();

        if ($billDetail) {
            if ($billDetail->id_subject == 0) {
                $subjectChilds = App\Models\Subject::where('id_subject', $id)->get();
                if (count($subjectChilds) > 0) {
                    if (isset($billDetail->id_subject)) {
                        return response()->json([
                            'code' => 500,
                            'message' => 'Không thể chuyển đổi danh mục môn học',
                            'data' => $billDetail
                        ]);
                    } else {
                        $updatedSubject = App\Models\Subject::where('id', $id)->update($request->all());
                        return response()->json([
                            'code' => 200,
                            'message' => 'Successfully!',
                            'data' => $updatedSubject
                        ], 200);
                    }
                } else {
                    $updatedSubject = App\Models\Subject::where('id', $id)->update($request->all());
                    return response()->json([
                        'code' => 200,
                        'message' => 'Successfully!',
                        'data' => $updatedSubject
                    ], 200);
                }
            } else {
                $updatedSubject = App\Models\Subject::where('id', $id)->update($request->all());
                return response()->json([
                    'code' => 200,
                    'message' => 'Successfully!',
                    'data' => $updatedSubject
                ], 200);
            }
        } else {
            return response()->json([
                'code' => 404,
                'message' => 'Student not found with ID: ' . $id
            ], 404);
        }
    }
    function delete($id)
    {
        $billDetail = App\Models\Subject::find($id);
        if ($billDetail) {
            $subjectChilds = App\Models\Subject::where('id_subject', $id)->get();
            if(count($subjectChilds) > 0){
                return response()->json([
                    'code' => 500,
                    'message' => 'Không thể xóa mục này!'
                ], 500);
            }else{
                try {
                    $billDetail->delete();
                    return response()->json([
                        'code' => 200,
                        'message' => 'Successfully!'
                    ], 200);
                } catch (\Exception $e) {
                    return response()->json([
                        'code' => 500,
                        'message' => 'Không thể xóa học sinh này!',
                        'message-code' => $e->getMessage()
                    ]);
                }
            }
        } else {
            return response()->json([
                'code' => 404,
                'message' => 'Student not found with ID: ' . $id
            ], 404);
        }
    }
}
