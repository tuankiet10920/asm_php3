<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

class TutorBillController extends Controller
{
    function index()
    {
        $tutorBills = App\Models\TutorBill::all();
        return response()->json($tutorBills);
    }
    function getById($id)
    {
        $tutorBill = App\Models\TutorBill::find($id);
        return response()->json($tutorBill);
    }
    function store(Request $request)
    {
        $kq = App\Models\TutorBill::create($request->all());
        // Hoặc bạn có thể trả về ID nếu cần sử dụng ở nơi khác
        return response()->json([
            'message' => 'Successfully!',
            'data' => $kq,
            'id' => $kq->id
        ], 201);
    }
    public function update(Request $request, string $id)
    {
        $tutorBill = App\Models\TutorBill::find($id);

        if (!$tutorBill) {
            return response()->json(['message' => 'Bill không tồn tại'], 404);
        }
        $tutorBill->fee = $request->fee;
        $tutorBill->total = $request->total;
        $tutorBill->status = $request->status;
        $tutorBill->payment_method = $request->payment_method;
        $tutorBill->id_tutor = $request->id_tutor;
        $tutorBill->id_class = $request->id_class;
        $tutorBill->save();
        return response()->json(['message' => 'Update thành công', 'data' => $tutorBill], 200);
    }
    public function delete(string $id)
    {
        $tutorBill = App\Models\TutorBill::find($id);
        $tutorBill->delete();
        return response()->json(['message' => 'Xóa thành công'], 200);
    }
}
