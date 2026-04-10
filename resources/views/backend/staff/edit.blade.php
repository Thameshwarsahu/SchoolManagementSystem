@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto">

            <div class="card shadow-lg p-4 border-0">
                <h3 class="text-center mb-4 fw-bold text-dpscolor">Add Staff</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('staff.update', $staff->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- BASIC -->
                    <div class="card mb-3 p-3 shadow-sm">
                        <h5 class="text-dpscolor">Basic Info</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $staff->name }}">
                            </div>

                            <div class="col-md-4">
                                <label>Staff ID</label>
                                <input type="text" name="staff_id" class="form-control" value="{{ $staff->staff_id }}">
                            </div>

                            <div class="col-md-4">
                                <label>Status</label><br>
                                <input type="checkbox" name="status" value="Active"
                                    {{ $staff->status == 'Active' ? 'checked' : '' }}> Active
                            </div>
                        </div>
                    </div>

                    <!-- JOB INFO -->
                    <div class="card mb-3 p-3 shadow-sm">
                        <h5 class="text-dpscolor">Job Info</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Designation</label>
                                <input type="text" name="designation" class="form-control"
                                    value="{{ $staff->designation }}">
                            </div>

                            <div class="col-md-4">
                                <label>Department</label>
                                <input type="text" name="department" class="form-control"
                                    value="{{ $staff->department }}">
                            </div>

                            <div class="col-md-4">
                                <label>Joining Date</label>
                                <input type="date" name="joining_date" class="form-control"
                                    value="{{ $staff->joining_date }}">
                            </div>
                        </div>
                    </div>

                    <!-- PERSONAL -->
                    <div class="card mb-3 p-3 shadow-sm">
                        <h5 class="text-dpscolor">Personal Info</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Gender</label>
                                <select name="gender" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Male" {{ $staff->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ $staff->gender == 'Female' ? 'selected' : '' }}>Female
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label>DOB</label>
                                <input type="date" name="dob" class="form-control" value="{{ $staff->dob }}">
                            </div>

                            <div class="col-md-4">
                                <label>Blood Group</label>
                                <select name="blood_group" class="form-control">
                                    <option value="">Select</option>
                                    <option value="A+" {{ $staff->blood_group == 'A+' ? 'selected' : '' }}>A+</option>
                                    <option value="B+" {{ $staff->blood_group == 'B+' ? 'selected' : '' }}>B+</option>
                                    <option value="O+" {{ $staff->blood_group == 'O+' ? 'selected' : '' }}>O+</option>
                                    <option value="AB+" {{ $staff->blood_group == 'AB+' ? 'selected' : '' }}>AB+
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- CONTACT -->
                    <div class="card mb-3 p-3 shadow-sm">
                        <h5 class="text-dpscolor">Contact</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Mobile</label>
                                <input type="text" name="mobile_no" class="form-control"
                                    value="{{ $staff->mobile_no }}">
                            </div>

                            <div class="col-md-4">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $staff->email }}">
                            </div>

                            <div class="col-md-4">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" value="{{ $staff->address }}">
                            </div>
                        </div>
                    </div>

                    <!-- SALARY -->
                    <div class="card mb-3 p-3 shadow-sm">
                        <h5 class="text-dpscolor">Salary</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Salary</label>
                                <input type="text" name="salary" class="form-control" value="{{ $staff->salary }}">
                            </div>

                            <div class="col-md-4">
                                <label>Bank Name</label>
                                <input type="text" name="bank_name" class="form-control"
                                    value="{{ $staff->bank_name }}">
                            </div>

                            <div class="col-md-4">
                                <label>Account Number</label>
                                <input type="text" name="account_no" class="form-control"
                                    value="{{ $staff->account_no }}">
                            </div>
                        </div>
                    </div>

                    <!-- IMAGE -->
                    <div class="card mb-3 p-3 shadow-sm">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Photo</label>
                                <input type="file" name="image" class="form-control">
                                @if ($staff->image)
                                    <img src="{{ asset('uploads/staff/' . $staff->image) }}" alt="Staff Image" class="mt-2"
                                        width="100">
                                @endif

                            </div>
                            <div class="col-md-6">
                                <label>password</label>
                                <input type="password" name="password" class="form-control"
                                    value="{{ $staff->password }}">
                            </div>
                        </div>

                    </div>

                    <button class="btn text-dpsbgcolor text-white w-100">Save Staff</button>

                </form>
            </div>
        </div>
    </div>
@endsection
