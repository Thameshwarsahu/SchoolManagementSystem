@extends('backend.layouts.app')

@section('content')
    <div class="row">

        @can('class.create')
            <div class="col-md-4">
                <div class="card shadow p-4">

                    <h4 class="mb-4 text-center">
                        {{ isset($editClass) ? 'Update Class' : 'Add Class' }}
                    </h4>

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

                    <form method="POST"
                        action="{{ isset($editClass) ? route('class.update', $editClass->id) : route('class.store') }}">

                        @csrf
                        @if (isset($editClass))
                            @method('PUT')
                        @endif

                        <label>Class Name</label>
                        <input type="text" name="class_name" value="{{ old('class_name', $editClass->class_name ?? '') }}"
                            class="form-control mb-3" placeholder="Enter Class e.g. 1, 2, 3 or I, II, III">

                        <label>Description</label>
                        <textarea name="description" class="form-control mb-3" placeholder="Optional">{{ isset($editClass) ? $editClass->description : old('description') }}</textarea>

                        <button type="submit" class="btn text-dpsbgcolor text-white w-100">
                            {{ isset($editClass) ? 'Update Class' : 'Save Class' }}
                        </button>

                        @if (isset($editClass))
                            <a href="{{ route('class.index') }}" class="btn btn-secondary w-100 mt-2">Cancel</a>
                        @endif

                    </form>
                </div>
            </div>
        @endcan

        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between mb-3">
                        <h4 class="card-title">Class List</h4>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Class Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($classes as $key => $class)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $class->class_name }}</td>
                                    <td>{{ $class->description }}</td>
                                    <td>
                                        @can('class.edit')
                                            <a href="{{ route('class.edit', $class->id) }}"
                                                class="btn btn-sm btn-info">Edit</a>
                                        @endcan
                                        @can('class.delete')
                                            {{-- DELETE --}}
                                            <form action="{{ route('class.destroy', $class->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Delete</button>
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
