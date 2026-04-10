<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    @php
        $setting = \App\Models\Setting::first();
        $logo = !empty($setting->logo) ? asset('uploads/settings/' . $setting->logo) : asset('SMS.png');
    @endphp
    <div class="navbar-brand-box">
        <a href="#" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ $logo }}" height="55">
            </span>
            <span class="logo-lg">
                <img src="{{ $logo }}" height="80">
            </span>
        </a>

        <a href="#" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ $logo }}" height="25">
            </span>
            <span class="logo-lg">
                <img src="{{ $logo }}" height="55">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">
        <div id="sidebar-menu">

            <ul class="metismenu list-unstyled" id="side-menu">

                <li class="menu-title">Menu</li>

                <li>
                    <a
                        href="{{ auth()->user()->hasRole('admin') ? route('admin.dashboard') : route('staff.dashboard') }}">
                        <i data-feather="home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                @can('student.view')
                    <li>
                        <a href="javascript:void(0);" class="has-arrow">
                            <i data-feather="users"></i>
                            <span>Student</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('student.index') }}">Student List</a></li>

                            @can('student.create')
                                <li><a href="{{ route('student.create') }}">Add Student</a></li>
                            @endcan

                            @can('student.view')
                                <li><a href="{{ route('student.cards') }}">Print Cards</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcan


                @can('class.view')
                    <li>
                        <a href="{{ route('class.index') }}">
                            <i data-feather="layers"></i>
                            <span>Classes</span>
                        </a>
                    </li>
                @endcan


                @can('section.view')
                    <li>
                        <a href="{{ route('section.index') }}">
                            <i data-feather="book"></i>
                            <span>Sections</span>
                        </a>
                    </li>
                @endcan


                @can('staff.view')
                    <li>
                        <a href="javascript:void(0);" class="has-arrow">
                            <i data-feather="user"></i>
                            <span>Staff</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('staff.index') }}">Staff List</a></li>

                            @can('staff.create')
                                <li><a href="{{ route('staff.create') }}">Add Staff</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @role('admin')
                    <li>
                        <a href="javascript:void(0);" class="has-arrow">
                            <i data-feather="shield"></i>
                            <span>Role & Permission</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('role.index') }}">Role List</a></li>
                            <li><a href="{{ route('role.create') }}">Create Role</a></li>
                        </ul>
                    </li>
                @endrole

                @role('admin')
                    <li>
                        <a href="{{ route('settings') }}">
                            <i data-feather="settings"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                @endrole
            </ul>

        </div>
    </div>
</div>
<!-- Left Sidebar End -->
