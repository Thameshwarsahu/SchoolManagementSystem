<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Sections;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:student.view')->only(['index', 'show']);
        $this->middleware('permission:student.create')->only(['create', 'store']);
        $this->middleware('permission:student.edit')->only(['edit', 'update']);
        $this->middleware('permission:student.delete')->only(['destroy']);
    }
    
    public function index()
    {
        $students = Student::latest()->get();
        return view('backend.student.index', compact('students'));
    }

    public function create()
    {
        $classes = Classes::all();
        $sections = Sections::all();

        return view('backend.student.create', compact('classes', 'sections'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'adm_no' => 'required|unique:students,adm_no',
            'name' => 'required',
            'class_id' => 'required',
            // 'section_id' => 'required',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/students'), $filename);
            $data['image'] = $filename;
        }

        Student::create($data);

        return redirect()->route('student.index')->with('success', 'Student Created Successfully');
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('backend.student.show', compact('student'));
    }
    public function edit(Student $student)
    {
        $classes = Classes::all();
        $sections = Sections::all();

        return view('backend.student.edit', compact('student', 'classes', 'sections'));
    }
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'adm_no' => 'required|unique:students,adm_no,' . $student->id,
            'name' => 'required',
            'class_id' => 'required',
            'section_id' => 'required',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/students'), $filename);
            $data['image'] = $filename;
        }

        $student->update($data);

        return redirect()->back()->with('success', 'Student Updated Successfully');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->back()->with('success', 'Student Deleted Successfully');
    }


    public function printCards(Request $request)
    {
        $classes = Classes::all();
        $sections = Sections::all();

        $query = Student::with(['class', 'section']);

        if ($request->class_id) {
            $query->where('class_id', $request->class_id);
        }

        if ($request->section_id) {
            $query->where('section_id', $request->section_id);
        }

        $students = $query->get();

        return view('backend.card_generate.index', compact('students', 'classes', 'sections'));
    }
}
