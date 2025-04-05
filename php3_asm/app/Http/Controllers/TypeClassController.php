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
    function store(Request $request){
        $kq = App\Models\TypeClass::create($request->all());
        // Hoặc bạn có thể trả về ID nếu cần sử dụng ở nơi khác
        return response()->json([
            'message' => 'Successfully!',
            'data' => $kq,
            'id' => $kq->id
        ], 201);
    }
    function update($id, Request $request){
        $billDetail = App\Models\TypeClass::where('id', $id)->first();
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
                    'message' => 'Updating type class error ' . $e->getMessage()
                ], 500);
            }
        }else{
            return response()->json([
                'code' => 404,
                'message' => 'Type class not found with ID: ' . $id
            ], 404);
        }
    }
    function delete($id){
        $billDetail = App\Models\TypeClass::find($id);
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
                    'message' => 'Không thể xóa loại lớp học này!',
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
