<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

class StudentController extends Controller
{
    function index(){
        $students = App\Models\Student::all();
        return response()->json($students);
    }
    function getById($id){
        $student = App\Models\Student::find($id);
        return response()->json($student);
    }
    function findStudents($keySearch){
        // if(!is_numeric($keySearch)){
        //     $searchItem = '%' . $keySearch . '%';
        // }else{
        //     $searchItem = $keySearch;
        // }
        $searchItem = '%' . $keySearch . '%';
        $students = App\Models\Student::where('name', 'like', $searchItem)->orWhere('id', 'like', $searchItem)->get();
        return response()->json($students, 200);
    }
    function store(Request $request){
        $kq = App\Models\Student::create($request->all());
        // Hoặc bạn có thể trả về ID nếu cần sử dụng ở nơi khác
        return response()->json([
            'message' => 'Successfully!',
            'data' => $kq,
            'id' => $kq->id
        ], 201);
    }
    function update($id, Request $request){
        $billDetail = App\Models\Student::where('id', $id)->first();
        if($billDetail){
            try {
                $billDetail->update($request->all());
                return response()->json([
                    'code' => '200',
                    'message' => 'Update success',
                    'id' => $id,
                    'data' => $billDetail
                ], 200);
            } catch (\Exception $e) {
                return response()->json([
                    'code' => 500,
                    'message' => 'Updating student error ' . $e->getMessage()
                ], 500);
            }
        }else{
            return response()->json([
                'code' => 404,
                'message' => 'Student not found with ID: ' . $id
            ], 404);
        }
    }
    function delete($id){
        $billDetail = App\Models\Student::find($id);
        if($billDetail){
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
        }else{
            return response()->json([
                'code' => 404,
                'message' => 'Student not found with ID: ' . $id
            ], 404);
        }
    }
}
