<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index($id = null)
    {
        $classes = Classes::all();

        $editClass = null;
        if ($id) {
            $editClass = Classes::findOrFail($id);
        }

        return view('backend.class.index', compact('classes', 'editClass'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required|unique:classes,class_name',
            'description' => 'nullable',
        ]);

        Classes::create([
            'class_name' => $request->class_name,
            'description' => $request->description,
        ]);

        return redirect()->route('class.index')
            ->with('success', 'Class created successfully.');
    }

    public function update(Request $request, $id)
    {
        $class = Classes::findOrFail($id);

        $request->validate([
            'class_name' => 'required|unique:classes,class_name,' . $id,
            'description' => 'nullable',
        ]);

        $class->update([
            'class_name' => $request->class_name,
            'description' => $request->description,
        ]);

        return redirect()->route('class.index')
            ->with('success', 'Class updated successfully.');
    }

    public function destroy($id)
    {
        $class = Classes::findOrFail($id);
        $class->delete();

        return redirect()->route('class.index')
            ->with('success', 'Class deleted successfully.');
    }
}
