@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between mb-3">
                        <h4 class="card-title">Student List</h4>
                        @can('student.create')
                            <a href="{{ route('student.create') }}" class="btn text-dpsbgcolor text-white">+ Add Student</a>
                        @endcan
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Photo</th>
                                <th>Admission No</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Section</th>
                                <th>Mobile</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($students as $key => $student)
                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    <td>
                                        @if ($student->image)
                                            <img src="{{ asset('uploads/students/' . $student->image) }}" width="50"
                                                height="50">
                                        @else
                                            No Image
                                        @endif
                                    </td>

                                    <td>{{ $student->adm_no }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->class->class_name ?? '' }}</td>
                                    <td>{{ $student->section->section_name ?? '' }}</td>
                                    <td>{{ $student->mobile_no }}</td>

                                    <td>
                                        @can('student.view')
                                            <a href="{{ route('student.show', $student->id) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        @endcan
                                        @can('student.edit')
                                            <a href="{{ route('student.edit', $student->id) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('student.delete')
                                            <form action="{{ route('student.destroy', $student->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        @endcan


                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
