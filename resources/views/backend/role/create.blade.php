@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 mx-auto">

            <div class="card shadow-lg p-4 border-0">
                <h3 class="text-center mb-4 fw-bold text-dpscolor">Create Role & Permission</h3>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
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

                <form method="POST" action="{{ route('role.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold">Role Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                            placeholder="Enter role name">
                    </div>

                    <div class="mb-2">
                        <input type="checkbox" id="selectAll">
                        <label for="selectAll"><b>Select All Permissions</b></label>
                    </div>

                    <div class="card p-3 shadow-sm">
                        <h5 class="text-dpscolor mb-3">Assign Permissions</h5>

                        @php
                            $grouped = collect($permissions)->groupBy(function ($item) {
                                return explode('.', $item->name)[0];
                            });
                        @endphp

                        @foreach ($grouped as $group => $perms)
                            <div class="mb-3">
                                <h6 class="text-primary text-uppercase">{{ $group }}</h6>

                                <div class="row">
                                    @foreach ($perms as $permission)
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                                    class="form-check-input"
                                                    {{ in_array($permission->name, old('permissions', [])) ? 'checked' : '' }}>

                                                <label class="form-check-label">
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <button class="btn text-dpsbgcolor text-white w-100 mt-3">
                        Save Role
                    </button>

                </form>
            </div>

        </div>
    </div>

    {{-- JS --}}
    <script>
        document.getElementById('selectAll').addEventListener('click', function() {
            document.querySelectorAll('input[name="permissions[]"]').forEach(cb => {
                cb.checked = this.checked;
            });
        });
    </script>

@endsection
