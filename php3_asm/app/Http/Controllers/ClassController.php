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
        $classes = App\Models\Classes::with(['type', 'subject', 'tutor'])->get();
        return response()->json($classes);
    }

    function getById($id)
    {
        $class = App\Models\Classes::find($id);
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
        $classes = App\Models\Classes::with(['type', 'subject', 'tutor'])
            ->where('name', 'like', '%' . $key . '%')
            ->orWhere('id', $key)
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
