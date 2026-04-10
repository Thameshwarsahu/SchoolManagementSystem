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
                <form method="POST" action="{{ route('student.update', $student->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- BASIC -->
                    <div class="card mb-3 p-3 shadow-sm">
                        <h5 class="text-dpscolor">Basic Info</h5>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Admission No <span class="text-danger">*</span></label>
                                <input type="text" name="adm_no" class="form-control" value="{{ $student->adm_no }}">
                            </div>
                            <div class="col-md-3">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" value="{{ $student->name }}">
                            </div>
                            <div class="col-md-3">
                                <label>Roll No</label>
                                <input type="text" name="roll_no" class="form-control" value="{{ $student->roll_no }}">
                            </div>
                            <div class="col-md-3">
                                <label>Status</label><br>
                                <div class="form-check form-switch">
                                    <input type="checkbox" name="status" value="Active"
                                        {{ $student->status == 'Active' ? 'checked' : '' }} class="form-check-input">
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
                                        <option value="{{ $class->id }}"
                                            {{ $student->class_id == $class->id ? 'selected' : '' }}>
                                            {{ $class->class_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label>Section</label>
                                <select name="section_id" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}"
                                            {{ $student->section_id == $section->id ? 'selected' : '' }}>
                                            {{ $section->section_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label>House Number</label>
                                <input type="text" name="house" class="form-control" value="{{ $student->house }}">
                            </div>

                            <div class="col-md-3">
                                <label>Category</label>
                                <select name="category" class="form-control">
                                    <option value="">Select</option>
                                    <option value="General" {{ $student->category == 'General' ? 'selected' : '' }}>General
                                    </option>
                                    <option value="OBC" {{ $student->category == 'OBC' ? 'selected' : '' }}>OBC</option>
                                    <option value="SC" {{ $student->category == 'SC' ? 'selected' : '' }}>SC</option>
                                    <option value="ST" {{ $student->category == 'ST' ? 'selected' : '' }}>ST</option>
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
                                    <option value="Male" {{ $student->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ $student->gender == 'Female' ? 'selected' : '' }}>Female
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label>DOB</label>
                                <input type="date" name="dob" class="form-control" value="{{ $student->dob }}">
                            </div>

                            <div class="col-md-3">
                                <label>Date of Admission</label>
                                <input type="date" name="doa" class="form-control" value="{{ $student->doa }}">
                            </div>

                            <div class="col-md-3">
                                <label>CoA</label>
                                <input type="text" name="coa" class="form-control" value="{{ $student->coa }}">
                            </div>

                            <div class="col-md-3 mt-2">
                                <label>Blood Group</label>
                                <select name="blood_group" class="form-control">
                                    <option value="">Select</option>
                                    <option value="A+" {{ $student->blood_group == 'A+' ? 'selected' : '' }}>A+
                                    </option>
                                    <option value="A-" {{ $student->blood_group == 'A-' ? 'selected' : '' }}>A-
                                    </option>
                                    <option value="B+" {{ $student->blood_group == 'B+' ? 'selected' : '' }}>B+
                                    </option>
                                    <option value="B-" {{ $student->blood_group == 'B-' ? 'selected' : '' }}>B-
                                    </option>
                                    <option value="AB+" {{ $student->blood_group == 'AB+' ? 'selected' : '' }}>AB+
                                    </option>
                                    <option value="AB-" {{ $student->blood_group == 'AB-' ? 'selected' : '' }}>AB-
                                    </option>
                                    <option value="O+" {{ $student->blood_group == 'O+' ? 'selected' : '' }}>O+
                                    </option>
                                    <option value="O-" {{ $student->blood_group == 'O-' ? 'selected' : '' }}>O-
                                    </option>
                                </select>

                            </div>

                            <div class="col-md-3 mt-2">
                                <label>Height (cm)</label>
                                <input type="text" name="height" class="form-control"
                                    value="{{ $student->height }}">
                            </div>

                            <div class="col-md-3 mt-2">
                                <label>Weight (kg)</label>
                                <input type="text" name="weight" class="form-control"
                                    value="{{ $student->weight }}">
                            </div>

                            <div class="col-md-3 mt-2">
                                <label>Religion</label>
                                <select name="religion" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Hindu" {{ $student->religion == 'Hindu' ? 'selected' : '' }}>Hindu
                                    </option>
                                    <option value="Sikh" {{ $student->religion == 'Sikh' ? 'selected' : '' }}>Sikh
                                    </option>
                                    <option value="Buddhist" {{ $student->religion == 'Buddhist' ? 'selected' : '' }}>
                                        Buddhist</option>
                                    <option value="Jain" {{ $student->religion == 'Jain' ? 'selected' : '' }}>Jain
                                    </option>
                                    <option value="Christian" {{ $student->religion == 'Christian' ? 'selected' : '' }}>
                                        Christian</option>
                                    <option value="Islam" {{ $student->religion == 'Islam' ? 'selected' : '' }}>Islam
                                    </option>
                                </select>

                            </div>

                            <div class="col-md-3 mt-2">
                                <label>Mother Tongue</label>
                                <input type="text" name="mother_tongue" class="form-control"
                                    value="{{ $student->mother_tongue }}">
                            </div>
                        </div>
                    </div>

                    <!-- FAMILY -->
                    <div class="card mb-3 p-3 shadow-sm">
                        <h5 class="text-dpscolor">Family</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Father Name</label>
                                <input type="text" name="father_name" class="form-control"
                                    value="{{ $student->father_name }}">
                            </div>
                            <div class="col-md-4">
                                <label>Mother Name</label>
                                <input type="text" name="mother_name" class="form-control"
                                    value="{{ $student->mother_name }}">
                            </div>
                            <div class="col-md-4">
                                <label>Guardian Name</label>
                                <input type="text" name="guardian" class="form-control"
                                    value="{{ $student->guardian }}">
                            </div>
                        </div>
                    </div>

                    <!-- CONTACT -->
                    <div class="card mb-3 p-3 shadow-sm">
                        <h5 class="text-dpscolor">Contact</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Mobile Number</label>
                                <input type="text" name="mobile_no" class="form-control"
                                    value="{{ $student->mobile_no }}">
                            </div>
                            <div class="col-md-4">
                                <label>WhatsApp Number</label>
                                <input type="text" name="wa_no" class="form-control"
                                    value="{{ $student->wa_no }}">
                            </div>

                            <div class="col-md-4">
                                <label>Registered Email</label>
                                <input type="email" name="registered_email" class="form-control"
                                    value="{{ $student->registered_email }}">
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
                                <input type="text" name="apaar_id" class="form-control"
                                    value="{{ $student->apaar_id }}">
                            </div>

                            <div class="col-md-4">
                                <label>Aadhar Number</label>
                                <input type="text" name="aadhar" class="form-control"
                                    value="{{ $student->aadhar }}">
                            </div>
                        </div>
                    </div>

                    <!-- ADDRESS -->
                    <div class="card mb-3 p-3 shadow-sm">
                        <h5 class="text-dpscolor">Address</h5>
                        <textarea name="address" class="form-control">{{ $student->address }}</textarea>
                    </div>

                    <!-- TC -->
                    <div class="card mb-3 p-3 shadow-sm">
                        <h5 class="text-dpscolor">TC Details</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <label>TC Issue Date</label>
                                <input type="date" name="tc_issue_date" class="form-control"
                                    value="{{ $student->tc_issue_date }}">
                            </div>
                            <div class="col-md-6">
                                <label>TC Session</label>
                                <input type="text" name="tc_session" class="form-control"
                                    value="{{ $student->tc_session }}">
                            </div>
                        </div>
                    </div>

                    <!-- IMAGE -->
                    <div class="card mb-3 p-3 shadow-sm">
                        <h5 class="text-dpscolor">Photo</h5>
                        <input type="file" name="image" class="form-control">
                        @if ($student->image)
                            <img src="{{ asset('uploads/students/' . $student->image) }}" alt="Student Photo" class="mt-3"
                                style="width: 150px; height: auto;">
                        @endif

                    </div>

                    <button class="btn text-dpsbgcolor text-white w-100">Save Student</button>

                </form>

            </div>

        </div>
    </div>
@endsection
