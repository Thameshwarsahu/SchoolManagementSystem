@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">

            <div class="card p-4">
                <h3>Edit Role & Permission</h3>

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
                <form method="POST" action="{{ route('role.update', $role->id) }}">
                    @csrf
                    @method('PUT')

                    <input type="text" name="name" value="{{ $role->name }}" class="form-control mb-3">

                    <div class="row">
                        @foreach ($permissions as $permission)
                            <div class="col-md-4">
                                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                    {{ in_array($permission->name, $rolePermissions) ? 'checked' : '' }}>
                                {{ $permission->name }}
                            </div>
                        @endforeach
                    </div>

                    <button class="btn btn-success mt-3">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection
