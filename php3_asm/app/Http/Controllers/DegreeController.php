<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Degree;
use App\Models\Tutor;
use Illuminate\Support\Facades\File;

class DegreeController extends Controller
{
    public function index()
    {
        return Degree::with('tutor')->get();
    }

    public function getById($id)
    {
        return Degree::with('tutor')->find($id);
    }

    public function store(Request $request)
    {
        $tutor = Tutor::find($request->id_tutor);
        if (!$tutor) {
            return response()->json(['message' => 'Tutor not found'], 404);
        }

        if (!$request->hasFile('image')) {
            return response()->json(['message' => 'Image is required'], 400);
        }

        $file = $request->file('image');
        $filename = $request->name . '_' . $request->id_tutor . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/degrees'), $filename);

        $degree = Degree::create([
            'name' => $request->name,
            'image' => $filename,
            'id_tutor' => $request->id_tutor,
        ]);

        return response()->json($degree->load('tutor'), 201);
    }

    public function update(Request $request, $id)
    {
        $degree = Degree::find($id);
        if (!$degree) {
            return response()->json(['message' => 'Degree not found'], 404);
        }

        // $tutor = Tutor::find($request->id_tutor);
        // if (!$tutor) {
        //     return response()->json(['message' => 'Tutor not found'], 404);
        // }

        if ($request->hasFile('image')) {
            $oldImage = public_path('images/degrees/' . $degree->image);
            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }

            $file = $request->file('image');
            $filename = $request->name . '_' . $request->id_tutor . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/degrees'), $filename);
            $degree->image = $filename;
        }

        $degree->update([
            'name' => $request->name ? $request->name : $degree->name,
            'id_tutor' => $request->id_tutor ? $request->id_tutor : $degree->id_tutor,
        ]);

        return response()->json($degree->load('tutor'));
    }

    public function delete($id)
    {
        $degree = Degree::find($id);
        if (!$degree) {
            return response()->json(['message' => 'Degree not found'], 404);
        }

        $imagePath = public_path('images/degrees/' . $degree->image);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $degree->delete();
        return response()->json(['message' => 'Degree deleted']);
    }

    public function search($key)
    {
        $degrees = Degree::with('tutor')
            ->where('name', 'like', '%' . $key . '%')
            ->get();
        return response()->json($degrees);
    }
}
