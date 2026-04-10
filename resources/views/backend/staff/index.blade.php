@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="card-title mb-0">Staff List</h4>
                        @can('staff.create')
                            <a href="{{ route('staff.create') }}" class="btn text-dpsbgcolor text-white">
                                + Add Staff
                            </a>
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
                        <thead class="bg-light">
                            <tr>
                                <th>#</th>
                                <th>Photo</th>
                                <th>Staff ID</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Department</th>
                                <th>Mobile</th>
                                <th width="150">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($staffs as $key => $staff)
                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    {{-- IMAGE --}}
                                    <td>
                                        <img src="{{ $staff->image ? asset('uploads/staff/' . $staff->image) : asset('assets/images/default.png') }}"
                                            width="50" height="50" style="border-radius:50%;">
                                    </td>

                                    <td>{{ $staff->staff_id }}</td>
                                    <td>{{ $staff->name }}</td>
                                    <td>{{ $staff->designation ?? '-' }}</td>
                                    <td>{{ $staff->department ?? '-' }}</td>
                                    <td>{{ $staff->mobile_no }}</td>

                                    <td>
                                        @can('staff.view')
                                            <a href="{{ route('staff.show', $staff->id) }}" class="btn btn-sm btn-info"
                                                title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        @endcan
                                        @can('staff.edit')
                                            <a href="{{ route('staff.edit', $staff->id) }}" class="btn btn-sm btn-primary"
                                                title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('staff.delete')
                                            <form action="{{ route('staff.destroy', $staff->id) }}" method="POST"
                                                style="display:inline-block;" onsubmit="return confirm('Are you sure?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No Staff Found</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
