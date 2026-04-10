@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-9 mx-auto">

            <div class="card shadow-lg border-0 rounded-4">

                <div class="card-header text-center text-white rounded-top-4"
                    style=" background: linear-gradient(90deg, #5a3d3d, #bba1a1);">
                    <h3 class="mb-0 fw-bold text-white">Staff Profile</h3>
                </div>

                <div class="card-body p-4">

                    <div class="text-center mb-4">
                        @if ($staff->image)
                            <img src="{{ asset('uploads/staff/' . $staff->image) }}" class="rounded-circle shadow"
                                width="120" height="120" style="object-fit:cover;">
                        @else
                            <img src="https://via.placeholder.com/120" class="rounded-circle shadow">
                        @endif

                        <h4 class="mt-3 mb-0 fw-bold">{{ $staff->name }}</h4>
                        <small class="text-muted">{{ $staff->designation }}</small>
                    </div>

                    <hr>

                    <!-- BASIC + JOB -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="p-3 border rounded-3 h-100">
                                <h5 class="text-primary mb-3">Basic Info</h5>
                                <p><b>Staff ID:</b> {{ $staff->staff_id }}</p>
                                <p><b>Status:</b>
                                    <span class="badge bg-success">{{ $staff->status }}</span>
                                </p>
                                <p><b>Department:</b> {{ $staff->department }}</p>
                                <p><b>Joining Date:</b> {{ $staff->joining_date }}</p>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="p-3 border rounded-3 h-100">
                                <h5 class="text-primary mb-3">Personal Info</h5>
                                <p><b>Gender:</b> {{ $staff->gender }}</p>
                                <p><b>DOB:</b> {{ $staff->dob }}</p>
                                <p><b>Blood Group:</b> {{ $staff->blood_group }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-3 border rounded-3 mb-3">
                        <h5 class="text-primary mb-3">Contact Info</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <p><b>Mobile:</b> {{ $staff->mobile_no }}</p>
                            </div>
                            <div class="col-md-4">
                                <p><b>Email:</b> {{ $staff->email }}</p>
                            </div>
                            <div class="col-md-4">
                                <p><b>Address:</b> {{ $staff->address }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-3 border rounded-3">
                        <h5 class="text-primary mb-3">Salary Details</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <p><b>Salary:</b> ₹{{ $staff->salary }}</p>
                            </div>
                            <div class="col-md-4">
                                <p><b>Bank:</b> {{ $staff->bank_name }}</p>
                            </div>
                            <div class="col-md-4">
                                <p><b>Account No:</b> {{ $staff->account_no }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('staff.index') }}" class="btn btn-secondary px-4">
                            ← Back
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
