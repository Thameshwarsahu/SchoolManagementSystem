@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card border-0 shadow-lg rounded-4">

                    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
                        <h4 class="fw-bold text-dpscolor mb-0">
                            ⚙️ System Settings
                        </h4>
                    </div>

                    <div class="card-body">

                        @if (session('success'))
                            <div class="alert alert-success rounded-3">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger rounded-3">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('settings.save') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">

                                <div class="col-md-7">

                                    <div class="card mb-4 border-0 shadow-sm rounded-4">
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">School Name *</label>
                                                    <input type="text" name="school_name"
                                                        value="{{ old('school_name', $setting->school_name ?? '') }}"
                                                        class="form-control rounded-3">
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">School Code</label>
                                                    <input type="text" name="school_code"
                                                        value="{{ old('school_code', $setting->school_code ?? '') }}"
                                                        class="form-control rounded-3">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mb-4 border-0 shadow-sm rounded-4">
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Mobile</label>
                                                    <input type="text" name="mobile"
                                                        value="{{ old('mobile', $setting->mobile ?? '') }}"
                                                        class="form-control rounded-3">
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" name="email"
                                                        value="{{ old('email', $setting->email ?? '') }}"
                                                        class="form-control rounded-3">
                                                </div>

                                                <div class="col-md-12">
                                                    <label class="form-label">Address</label>
                                                    <textarea name="address" rows="3" class="form-control rounded-3">{{ old('address', $setting->address ?? '') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mb-4 border-0 shadow-sm rounded-4">
                                        <div class="card-body">

                                            <label class="form-label">Session Year</label>
                                            <input type="text" name="session_year"
                                                value="{{ old('session_year', $setting->session_year ?? '') }}"
                                                class="form-control rounded-3">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-5">

                                    <div class="card mb-4 border-0 shadow-sm rounded-4 text-center">
                                        <div class="card-body">
                                            <h6 class="fw-semibold mb-3">School Logo</h6>

                                            <input type="file" name="logo" class="form-control mb-3">

                                            @if (!empty($setting->logo))
                                                <img src="{{ asset('uploads/settings/' . $setting->logo) }}"
                                                    class="img-fluid rounded shadow-sm" style="max-height:120px;">
                                            @else
                                                <p class="text-muted">No Logo Uploaded</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="card mb-4 border-0 shadow-sm rounded-4 text-center">
                                        <div class="card-body">
                                            <h6 class="fw-semibold mb-3">Signature</h6>

                                            <input type="file" name="sign" class="form-control mb-3">

                                            @if (!empty($setting->sign))
                                                <img src="{{ asset('uploads/settings/' . $setting->sign) }}"
                                                    class="img-fluid rounded shadow-sm" style="max-height:100px;">
                                            @else
                                                <p class="text-muted">No Signature Uploaded</p>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="text-end">
                                <button class="btn text-dpsbgcolor text-white px-5 py-2 rounded-3">
                                    💾 Save Settings
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
