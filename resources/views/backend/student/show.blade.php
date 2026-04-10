@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 mx-auto">

            <div class="card shadow-lg border-0 rounded-4">

                <div class="card-header text-center text-white rounded-top-4"
                    style=" background: linear-gradient(90deg, #5a3d3d, #bba1a1);">
                    <h3 class="mb-0 fw-bold text-white">Student Profile</h3>
                </div>

                <div class="card-body p-4">

                    <div class="text-center mb-4">
                        @if ($student->image)
                            <img src="{{ asset('uploads/students/' . $student->image) }}" class="rounded-circle shadow"
                                width="120" height="120" style="object-fit:cover;">
                        @else
                            <img src="https://via.placeholder.com/120" class="rounded-circle shadow">
                        @endif

                        <h4 class="mt-3 fw-bold">{{ $student->name }}</h4>
                        <small class="text-muted">Adm No: {{ $student->adm_no }}</small>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="p-3 border rounded-3 h-100">
                                <h5 class="text-dpscolor mb-3">Basic Info</h5>
                                <p><b>Roll No:</b> {{ $student->roll_no }}</p>
                                <p><b>Status:</b>
                                    <span class="badge bg-success">{{ $student->status }}</span>
                                </p>
                                <p><b>Class:</b> {{ $student->class->class_name ?? '' }}</p>
                                <p><b>Section:</b> {{ $student->section->section_name ?? '' }}</p>
                                <p><b>House:</b> {{ $student->house }}</p>
                                <p><b>Category:</b> {{ $student->category }}</p>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="p-3 border rounded-3 h-100">
                                <h5 class="text-dpscolor mb-3">Personal Info</h5>
                                <p><b>Gender:</b> {{ $student->gender }}</p>
                                <p><b>DOB:</b> {{ $student->dob }}</p>
                                <p><b>DOA:</b> {{ $student->doa }}</p>
                                <p><b>Blood Group:</b> {{ $student->blood_group }}</p>
                                <p><b>Height:</b> {{ $student->height }} cm</p>
                                <p><b>Weight:</b> {{ $student->weight }} kg</p>
                                <p><b>Religion:</b> {{ $student->religion }}</p>
                                <p><b>Mother Tongue:</b> {{ $student->mother_tongue }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-3 border rounded-3 mb-3">
                        <h5 class="text-dpscolor mb-3">Family Details</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <p><b>Father:</b> {{ $student->father_name }}</p>
                            </div>
                            <div class="col-md-4">
                                <p><b>Mother:</b> {{ $student->mother_name }}</p>
                            </div>
                            <div class="col-md-4">
                                <p><b>Guardian:</b> {{ $student->guardian }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-3 border rounded-3 mb-3">
                        <h5 class="text-dpscolor mb-3">Contact Info</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <p><b>Mobile:</b> {{ $student->mobile_no }}</p>
                            </div>
                            <div class="col-md-4">
                                <p><b>WhatsApp:</b> {{ $student->wa_no }}</p>
                            </div>
                            <div class="col-md-4">
                                <p><b>Email:</b> {{ $student->registered_email }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-3 border rounded-3 mb-3">
                        <h5 class="text-dpscolor mb-3">Identity</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <p><b>PEN:</b> {{ $student->pen }}</p>
                            </div>
                            <div class="col-md-4">
                                <p><b>APAAR ID:</b> {{ $student->apaar_id }}</p>
                            </div>
                            <div class="col-md-4">
                                <p><b>Aadhar:</b> {{ $student->aadhar }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- ADDRESS -->
                    <div class="p-3 border rounded-3 mb-3">
                        <h5 class="text-dpscolor mb-3">Address</h5>
                        <p>{{ $student->address }}</p>
                    </div>

                    <!-- TC -->
                    <div class="p-3 border rounded-3">
                        <h5 class="text-dpscolor mb-3">TC Details</h5>
                        <p><b>TC Date:</b> {{ $student->tc_issue_date }}</p>
                        <p><b>Session:</b> {{ $student->tc_session }}</p>
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('student.index') }}" class="btn btn-secondary px-4">
                            ← Back
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
