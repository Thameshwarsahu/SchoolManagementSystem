@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto">

            <div class="card shadow-lg p-4 border-0">
                <h3 class="text-center text-dpscolor mb-4 fw-bold">Add Student</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('student.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- BASIC -->
                    <div class="card mb-3 p-3 shadow-sm">
                        <h5 class="text-dpscolor">Basic Info</h5>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Admission No <span class="text-danger">*</span></label>
                                <input type="text" name="adm_no" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label>Roll No</label>
                                <input type="text" name="roll_no" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label>Status</label><br>
                                <div class="form-check form-switch">
                                    <input type="checkbox" name="status" value="Active" checked class="form-check-input">
                                    <label class="form-check-label text-success fw-bold">Active</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3 p-3 shadow-sm">
                        <h5 class="text-dpscolor">Class Info</h5>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Class <span class="text-danger">*</span></label>
                                <select name="class_id" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label>Section</label>
                                <select name="section_id" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label>House Number</label>
                                <input type="text" name="house" class="form-control">
                            </div>

                            <div class="col-md-3">
                                <label>Category</label>
                                <select name="category" class="form-control">
                                    <option value="">Select</option>
                                    <option>General</option>
                                    <option>OBC</option>
                                    <option>SC</option>
                                    <option>ST</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3 p-3 shadow-sm">
                        <h5 class="text-dpscolor">Personal Info</h5>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Gender</label>
                                <select name="gender" class="form-control">
                                    <option value="">Select</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label>DOB</label>
                                <input type="date" name="dob" class="form-control">
                            </div>

                            <div class="col-md-3">
                                <label>Date of Admission</label>
                                <input type="date" name="doa" class="form-control">
                            </div>

                            <div class="col-md-3">
                                <label>CoA</label>
                                <input type="text" name="coa" class="form-control">
                            </div>

                            <div class="col-md-3 mt-2">
                                <label>Blood Group</label>
                                <select name="blood_group" class="form-control">
                                    <option value="">Select</option>
                                    <option>A+</option>
                                    <option>A-</option>
                                    <option>B+</option>
                                    <option>B-</option>
                                    <option>AB+</option>
                                    <option>AB-</option>
                                    <option>O+</option>
                                    <option>O-</option>
                                </select>

                            </div>

                            <div class="col-md-3 mt-2">
                                <label>Height (cm)</label>
                                <input type="text" name="height" class="form-control">
                            </div>

                            <div class="col-md-3 mt-2">
                                <label>Weight (kg)</label>
                                <input type="text" name="weight" class="form-control">
                            </div>

                            <div class="col-md-3 mt-2">
                                <label>Religion</label>
                                <select name="religion" class="form-control">
                                    <option value="">Select</option>
                                    <option>Hindu</option>
                                    <option>Sikh</option>
                                    <option>Buddhist</option>
                                    <option>Jain</option>
                                    <option>Christian</option>
                                    <option>Islam</option>
                                </select>

                            </div>

                            <div class="col-md-3 mt-2">
                                <label>Mother Tongue</label>
                                <input type="text" name="mother_tongue" class="form-control">
                            </div>
                        </div>
                    </div>

                    <!-- FAMILY -->
                    <div class="card mb-3 p-3 shadow-sm">
                        <h5 class="text-dpscolor">Family</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Father Name</label>
                                <input type="text" name="father_name" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label>Mother Name</label>
                                <input type="text" name="mother_name" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label>Guardian Name</label>
                                <input type="text" name="guardian" class="form-control">
                            </div>
                        </div>
                    </div>

                    <!-- CONTACT -->
                    <div class="card mb-3 p-3 shadow-sm">
                        <h5 class="text-dpscolor">Contact</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Mobile Number</label>
                                <input type="text" name="mobile_no" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label>WhatsApp Number</label>
                                <input type="text" name="wa_no" class="form-control">
                            </div>

                            <div class="col-md-4">
                                <label>Registered Email</label>
                                <input type="email" name="registered_email" class="form-control">
                            </div>
                        </div>
                    </div>

                    <!-- IDs -->
                    <div class="card mb-3 p-3 shadow-sm">
                        <h5 class="text-dpscolor">Identity</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <label>PEN</label>
                                <input type="text" name="pen" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label>APAAR ID</label>
                                <input type="text" name="apaar_id" class="form-control">
                            </div>

                            <div class="col-md-4">
                                <label>Aadhar Number</label>
                                <input type="text" name="aadhar" class="form-control">
                            </div>
                        </div>
                    </div>

                    <!-- ADDRESS -->
                    <div class="card mb-3 p-3 shadow-sm">
                        <h5 class="text-dpscolor">Address</h5>
                        <textarea name="address" class="form-control"></textarea>
                    </div>

                    <!-- TC -->
                    <div class="card mb-3 p-3 shadow-sm">
                        <h5 class="text-dpscolor">TC Details</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <label>TC Issue Date</label>
                                <input type="date" name="tc_issue_date" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>TC Session</label>
                                <input type="text" name="tc_session" class="form-control">
                            </div>
                        </div>
                    </div>

                    <!-- IMAGE -->
                    <div class="card mb-3 p-3 shadow-sm">
                        <h5 class="text-dpscolor">Photo</h5>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <button class="btn text-dpsbgcolor text-white w-100">Save Student</button>

                </form>

            </div>

        </div>
    </div>
@endsection
