@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-dpscolor">Role & Permission</h3>

            <a href="{{ route('role.create') }}" class="btn text-dpsbgcolor text-white">
                <i class="fas fa-plus"></i> Add Role
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger shadow-sm">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-lg border-0">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center">

                        <thead class="bg-light">
                            <tr>
                                <th>#</th>
                                <th>Role Name</th>
                                <th>Permissions</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($roles as $key => $role)
                                <tr>

                                    <td>{{ $key + 1 }}</td>

                                    <td>
                                        <span class="fw-bold text-primary">
                                            {{ ucfirst($role->name) }}
                                        </span>
                                    </td>

                                    <td>
                                        @foreach ($role->permissions as $p)
                                            <span class="badge bg-success me-1 mb-1">
                                                {{ $p->name }}
                                            </span>
                                        @endforeach
                                    </td>

                                    <td>

                                        <a href="{{ route('role.edit', $role->id) }}"
                                            class="btn btn-sm btn-warning rounded-circle me-1" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('role.destroy', $role->id) }}" method="POST"
                                            style="display:inline-block;" onsubmit="return confirm('Delete this role?')">

                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-sm btn-danger rounded-circle" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>

                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-muted">No roles found</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

            </div>
        </div>

    </div>
@endsection
