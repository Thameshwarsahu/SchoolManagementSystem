<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Sections;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id = null)
    {
        $sections = Sections::with('class')->get();
        $classes = Classes::all();

        $editSection = null;
        if ($id) {
            $editSection = Sections::findOrFail($id);
        }

        return view('backend.section.index', compact('sections', 'classes', 'editSection'));
    }
    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required',
            'section_name' => 'required',
        ]);

        $section = new Sections();
        $section->class_id = $request->class_id;
        $section->section_name = $request->section_name;
        $section->save();

        return redirect()->route('section.index')->with('success', 'Section created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sections $sections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sections $sections)
    {
        $request->validate([
            'class_id' => 'required',
            'section_name' => 'required|unique:sections,section_name,' . $sections->id,
        ]);

        $sections->class_id = $request->class_id;
        $sections->section_name = $request->section_name;
        $sections->save();

        return redirect()->route('section.index')->with('success', 'Section updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sections $sections)
    {
        $sections->delete();
        return redirect()->route('section.index')->with('success', 'Section deleted successfully.');
    }
}
