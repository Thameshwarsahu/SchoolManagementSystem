<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index()
    {
        $setting = Setting::first();
        return view('backend.setting.index', compact('setting'));
    }

    public function save(Request $request)
    {
        $setting = Setting::first();

        if (!$setting) {
            $setting = new Setting();
        }

        $setting->school_name = $request->school_name;
        $setting->school_code = $request->school_code;
        $setting->mobile = $request->mobile;
        $setting->email = $request->email;
        $setting->address = $request->address;
        $setting->session_year = $request->session_year;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/settings'), $filename);
            $setting->logo = $filename;
        }
        if ($request->hasFile('sign')) {
            $file = $request->file('sign');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/settings'), $filename);
            $setting->sign = $filename;
        }

        $setting->save();

        return back()->with('success', 'Settings saved successfully');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
