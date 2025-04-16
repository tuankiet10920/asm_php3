<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function index()
    {
        $classes = App\Models\Classes::with(['type', 'subject', 'tutor', 'students'])->get();
        return response()->json($classes);
    }

    public function getById($id)
    {
        $class = App\Models\Classes::with(['subject', 'tutor', 'type'])->find($id);

        if (!$class) {
            return response()->json(['message' => 'Lớp học không tồn tại'], 404);
        }

        // Trả về dữ liệu lớp học dưới dạng JSON
        return response()->json($class);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function search($key)
    {
        $classes = App\Models\Classes::with(['type', 'subject', 'tutor', 'students'])
            ->where('id', 'like', '%' . $key . '%')
            ->get();

        return response()->json($classes);
    }



    /**
     * Store a newly created resource in storage.
     */
    function store(Request $request)
    {
        $kq = App\Models\Classes::create($request->all());
        // Hoặc bạn có thể trả về ID nếu cần sử dụng ở nơi khác
        return response()->json([
            'message' => 'Successfully!',
            'data' => $kq,
            'id' => $kq->id
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Tìm class theo ID
        $class = App\Models\Classes::find($id);
        if (!$class) {
            return response()->json(['message' => 'Class not found'], 404);
        }
        $class->update($request->all());
        return response()->json([
            'message' => 'Successfully updated!',
            'data' => $class
        ]);
    }


    function delete($id)
    {
        $class = App\Models\Classes::find($id);
        if ($class) {
            try {
                $class->delete();
                return response()->json([
                    'code' => 200,
                    'message' => 'Successfully!'
                ], 200);
            } catch (\Exception $e) {
                return response()->json([
                    'code' => 500,
                    'message' => 'Không thể xóa lớp này!',
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}