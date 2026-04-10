@extends('backend.layouts.app')

@section('content')
    <div class="row">
        @can('section.create')
            <div class="col-md-4">
                <div class="card shadow p-4">

                    <h4 class="mb-4 text-center">
                        {{ isset($editSection) ? 'Update Section' : 'Add Section' }}
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
                        action="{{ isset($editSection) ? route('section.update', $editSection->id) : route('section.store') }}">

                        @csrf
                        @if (isset($editSection))
                            @method('PUT')
                        @endif

                        <label>Class</label>
                        <select name="class_id" class="form-control mb-3">
                            <option value="">Select Class</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}"
                                    {{ old('class_id', $editSection->class_id ?? '') == $class->id ? 'selected' : '' }}>
                                    {{ $class->class_name }}
                                </option>
                            @endforeach
                        </select>

                        <label>Section Name</label>
                        <input type="text" name="section_name"
                            value="{{ old('section_name', $editSection->section_name ?? '') }}" class="form-control mb-3"
                            placeholder="A / B / C">

                        <button type="submit" class="btn text-dpsbgcolor text-white w-100">
                            {{ isset($editSection) ? 'Update Section' : 'Save Section' }}
                        </button>

                        @if (isset($editSection))
                            <a href="{{ route('section.index') }}" class="btn btn-secondary w-100 mt-2">Cancel</a>
                        @endif

                    </form>
                </div>
            </div>
        @endcan

        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title mb-3">Section List</h4>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Class</th>
                                <th>Section Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($sections as $key => $section)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $section->class->class_name ?? '' }}</td>
                                    <td>{{ $section->section_name }}</td>
                                    <td>
                                        @can('section.edit')
                                            <a href="{{ route('section.edit', $section->id) }}"
                                                class="btn btn-sm btn-info">Edit</a>
                                        @endcan
                                        @can('section.delete')
                                            <form action="{{ route('section.destroy', $section->id) }}" method="POST"
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
