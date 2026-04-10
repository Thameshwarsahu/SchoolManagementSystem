@extends('backend.layouts.app')

@section('content')
    @push('css')
        <style>
            .print-area {
                display: flex;
                flex-wrap: wrap;
                gap: 20px;
            }

            .id-card {
                width: 300px;
                height: 480px;
                border: 2px solid #999;
                padding: 25px;
                font-family: Arial;
                position: relative;
                background: #fff;
                box-sizing: border-box;
                font-size: 16px;
            }

            .id-card::before {
                content: "";
                position: absolute;
                top: 10px;
                left: 10px;
                right: 10px;
                bottom: 10px;
                border: 2px dashed #000;
                pointer-events: none;
            }

            @media print {

                * {
                    -webkit-print-color-adjust: exact !important;
                    print-color-adjust: exact !important;
                }

                @page {
                    size: A4;
                    margin: 5mm;
                }

                body {
                    margin: 0;
                }

                body * {
                    visibility: hidden;
                }

                .print-area,
                .print-area * {
                    visibility: visible;
                }

                .print-area {
                    gap: 10px;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                }

                .card-row {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    gap: 20px;
                    margin-bottom: 10px;

                    /* page-break-after: always; */
                }

                .id-card {
                    width: 7.7cm;
                    height: 11.7cm;
                    box-sizing: border-box;
                    border: 1px dashed #000;
                    font-size: 12px;
                }

                form,
                .btn {
                    display: none !important;
                }

                .footer-card {
                    background: #5a3d3d !important;
                    color: #fff !important;
                }

                b,
                strong {
                    font-weight: 700 !important;
                }
            }

            .header {
                text-align: center;
            }

            .photo {
                width: 120px;
                height: 150px;
                margin: 5px auto;
                border: 2px solid #000;
            }

            .photo img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .center {
                text-align: center;
                font-weight: bold;
            }

            .footer-card {
                position: absolute;
                bottom: 20px;
                left: 50%;
                transform: translateX(-50%);
                width: 85%;
                background: #5a3d3d;
                color: #fff;
                font-size: 10px;
                text-align: center;
                /* padding: 6px; */
                font-size: 11px;
            }

            .details {
                font-size: 12px;
                margin-top: 30px;
                font-weight: bold;
            }
        </style>
    @endpush
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
    @php
        $setting = \App\Models\Setting::first();
        $logo = !empty($setting->logo) ? asset('uploads/settings/' . $setting->logo) : asset('SMS.png');
        $sign = !empty($setting->sign) ? asset('uploads/settings/' . $setting->sign) : asset('sign.jpeg');
        $session = !empty($setting->session_year) ? $setting->session_year : '2025-26';
    @endphp
    <form method="GET" action="{{ route('student.cards') }}" class="row mb-3">

        <div class="col-md-3">
            <select name="class_id" class="form-control">
                <option value="">Select Class</option>
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}" {{ request('class_id') == $class->id ? 'selected' : '' }}>
                        {{ $class->class_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <select name="section_id" class="form-control">
                <option value="">Select Section</option>
                @foreach ($sections as $section)
                    <option value="{{ $section->id }}" data-class="{{ $section->class_id }}"
                        {{ request('section_id') == $section->id ? 'selected' : '' }}>
                        {{ $section->section_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <button class="btn text-dpsbgcolor text-white">Filter</button>
        </div>

        <div class="col-md-3">
            <button type="button" onclick="window.print()" class="btn text-dpsbgcolor text-white">
                Print Cards
            </button>
        </div>

    </form>

    <div class="print-area">
        @forelse ($students as $student)
            <div class="card-row">

                <!-- FRONT -->
                <div class="id-card">

                    <div class="header">
                        <img src="{{ $logo }}" width="120">
                    </div>

                    <div class="center">
                        <b>Session: {{ $session }}</b><br>
                        <b>STUDENT</b>
                    </div>

                    <div class="photo">
                        <img src="{{ asset('uploads/students/' . $student->image) }}" alt="Student Image">
                    </div>

                    <div class="center">
                        <b>{{ $student->name }}</b><br>
                        <b>Adm. No.: {{ $student->adm_no }}</b><br>
                        <b>Class: {{ $student->class->class_name ?? '' }} -
                            {{ $student->section->section_name ?? '' }}</b>
                    </div>

                    <div class="footer-card">
                        Gudhiyari, Raipur, CG <br>
                        12345678901 / 1122112211 / 1245678901 <br>
                        thameshwarsahu@gmail.com www.thameshwarsahu.in
                    </div>

                </div>

                <!-- BACK -->
                <div class="id-card">

                    <div class="center">
                        <b>PERSONAL DETAILS</b>
                    </div>

                    <div class="details">
                        Date of Birth: {{ $student->dob }} <br><br>
                        Blood Group: {{ $student->blood_group }} <br><br>
                        Guardian: {{ $student->father_name }} <br><br><br>
                        Contact No.: {{ $student->mobile_no }} <br><br>
                        Address: {{ $student->address }}
                    </div>

                    <div style="position:absolute; bottom:60px; left:30px;">
                        <img src="{{ $sign }}" width="40">
                    </div>

                    <div style="position:absolute; bottom:40px; left:25px;">
                        <b>Principal</b>
                    </div>

                    <div style="position:absolute; bottom:15px; right:20px;">
                        {{ $student->adm_no }}
                    </div>

                </div>

            </div>

        @empty
            <div class="alert alert-danger">
                No students found
            </div>
        @endforelse

    </div>
    @push('script')
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                let classSelect = document.querySelector('[name="class_id"]');
                let sectionSelect = document.querySelector('[name="section_id"]');

                classSelect.addEventListener('change', function() {

                    let classId = this.value;

                    sectionSelect.querySelectorAll('option').forEach(option => {

                        if (!option.value) return;

                        let match = option.getAttribute('data-class') == classId;

                        option.style.display = match ? 'block' : 'none';
                    });

                });

            });
        </script>
    @endpush
@endsection
