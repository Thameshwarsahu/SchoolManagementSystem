@extends('backend.layouts.app')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">

                <h4 class="mb-0">
                    @if (auth()->user()->hasRole('admin'))
                        Admin Dashboard
                    @else
                        Staff Dashboard
                    @endif
                </h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">School</li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>


    <div class="row">

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-8 col-9">
                            <h5 class="mb-1 font-size-18 font-weight-semibold">
                                {{ \App\Models\Student::count() }}
                            </h5>
                            <p class="text-muted font-size-13">Total Students</p>
                        </div>

                        <div class="col-md-4 col-3">
                            <div class="avatar rounded float-right p-1 border border-soft-primary">
                                <div class="avatar-title bg-soft-primary text-primary h3">
                                    <i class="mdi mdi-account"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-8 col-9">
                            <h5 class="mb-1 font-size-18 font-weight-semibold">
                                @if (auth()->user()->hasRole('admin'))
                                    {{ \App\Models\Staff::count() }}
                                @else
                                    {{ \App\Models\Classes::count() }}
                                @endif
                            </h5>

                            <p class="text-muted font-size-13">
                                @if (auth()->user()->hasRole('admin'))
                                    Total Staff
                                @else
                                    Total Classes
                                @endif
                            </p>
                        </div>

                        <div class="col-md-4 col-3">
                            <div class="avatar rounded float-right p-1 border border-soft-info">
                                <div class="avatar-title bg-soft-info text-info h3">
                                    <i class="mdi mdi-account-group"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-8 col-9">
                            <h5 class="mb-1 font-size-18 font-weight-semibold">
                                {{ \App\Models\Classes::count() }}
                            </h5>
                            <p class="text-muted font-size-13">Total Classes</p>
                        </div>

                        <div class="col-md-4 col-3">
                            <div class="avatar rounded float-right p-1 border border-soft-danger">
                                <div class="avatar-title bg-soft-danger text-danger h3">
                                    <i class="mdi mdi-school"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-8 col-9">
                            <h5 class="mb-1 font-size-18 font-weight-semibold">
                                {{ \App\Models\Sections::count() }}
                            </h5>
                            <p class="text-muted font-size-13">Total Sections</p>
                        </div>

                        <div class="col-md-4 col-3">
                            <div class="avatar rounded float-right p-1 border border-soft-success">
                                <div class="avatar-title bg-soft-success text-success h3">
                                    <i class="mdi mdi-view-grid"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-3">Recent Students</h4>

                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Class</th>
                                        <th>Mobile</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach (\App\Models\Student::latest()->take(5)->get() as $key => $student)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->class->class_name ?? '-' }}</td>
                                            <td>{{ $student->mobile_no }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            @if (auth()->user()->hasRole('admin'))
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title mb-3">Recent Staff</h4>

                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>Mobile</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach (\App\Models\Staff::latest()->take(5)->get() as $key => $staff)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $staff->name }}</td>
                                                <td>{{ $staff->designation ?? '-' }}</td>
                                                <td>{{ $staff->mobile_no }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
