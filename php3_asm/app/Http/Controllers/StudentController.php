<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    function index()
    {
        $students = App\Models\Student::all();
        return response()->json($students);
    }
    function getById($id)
    {
        $student = App\Models\Student::find($id);
        return response()->json($student);
    }

    function getAllByStudentID($id)
    {
        $info = DB::table('student_class')
            ->join('class', 'class.id', '=', 'student_class.id_class')
            ->join('type_class', 'class.id_type', '=', 'type_class.id')
            ->select('student_class.*', 'class.time_start', 'type_class.name', 'type_class.price')
            ->where('student_class.id', $id)
            ->get();
        return response()->json([
            'message' => 'Successfully!',
            'data' => $info
        ]);
    }
    function login(Request $request)
    {
        $student = App\Models\Student::where([
            ["email", '=', $request->email],
            ["password", '=', $request->password]
        ])->first();
        if ($student) {
            return response()->json([
                'message' => 'Successfullly!',
                'data' => $student,
                'code' => 200
            ], 200);
        } else {
            return response()->json([
                'message' => 'Login failed!',
                'code' => 500
            ], 500);
        }
    }
    function findStudents($keySearch)
    {
        $searchItem = '%' . $keySearch . '%';
        $students = App\Models\Student::where('name', 'like', $searchItem)->orWhere('id', 'like', $searchItem)->get();
        return response()->json($students, 200);
    }
    function store(Request $request)
    {
        $kq = App\Models\Student::create($request->all());
        // Hoặc bạn có thể trả về ID nếu cần sử dụng ở nơi khác
        return response()->json([
            'message' => 'Successfully!',
            'data' => $kq,
            'id' => $kq->id
        ], 201);
    }
    public function update($id, Request $request)
    {
        $student = App\Models\Student::where('id', $id)->first();

        if ($student) {
            // Kiểm tra nếu có email và email không trùng với email của học viên hiện tại
            if ($request->has('email') && $request->email !== $student->email) {
                $existingStudent = App\Models\Student::where('email', $request->email)->first();
                if ($existingStudent) {
                    return response()->json([
                        'code' => 400,
                        'message' => 'Email đã tồn tại'
                    ], 400);
                }
            }

            try {
                $student->update($request->all());

                return response()->json([
                    'code' => '200',
                    'message' => 'Cập nhật thành công',
                    'id' => $id,
                    'data' => $student
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

    function delete($id)
    {
        $student = App\Models\Student::find($id);
        if ($student) {
            try {
                $student->delete();
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
        } else {
            return response()->json([
                'code' => 404,
                'message' => 'Student not found with ID: ' . $id
            ], 404);
        }
    }
}
