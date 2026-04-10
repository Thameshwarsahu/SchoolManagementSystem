<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:staff.view')->only(['index', 'show']);
        $this->middleware('permission:staff.create')->only(['create', 'store']);
        $this->middleware('permission:staff.edit')->only(['edit', 'update']);
        $this->middleware('permission:staff.delete')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = Staff::with('user')->get();

        return view('backend.staff.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.staff.add');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'mobile_no' => 'required',
            'password' => 'required|min:6',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/staff'), $imageName);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('staff');

        Staff::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'staff_id' => $request->staff_id,
            'blood_group' => $request->blood_group,
            'designation' => $request->designation,
            'department' => $request->department,
            'joining_date' => $request->joining_date,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'salary' => $request->salary,
            'bank_name' => $request->bank_name,
            'account_no' => $request->account_no,
            'image' => $imageName,
            'status' => $request->status ?? 'Inactive',
        ]);

        return redirect()->route('staff.index')->with('success', 'Staff Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $staff = Staff::findOrFail($id);

        return view('backend.staff.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        return view('backend.staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $staff->user_id,
            'mobile_no' => 'required',
            'password' => 'nullable|min:6',
        ]);

        $imageName = $staff->image;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/staff'), $imageName);
        }

        $user = User::find($staff->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        $staff->update([
            'name' => $request->name,
            'staff_id' => $request->staff_id,
            'designation' => $request->designation,
            'department' => $request->department,
            'blood_group' => $request->blood_group,
            'joining_date' => $request->joining_date,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'salary' => $request->salary,
            'bank_name' => $request->bank_name,
            'account_no' => $request->account_no,
            'image' => $imageName,
            'status' => $request->status ?? 'Inactive',
        ]);

        return redirect()->route('staff.index')->with('success', 'Staff Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        $staff->delete();

        return redirect()->route('staff.index')->with('success', 'Staff Deleted Successfully');
    }
}
