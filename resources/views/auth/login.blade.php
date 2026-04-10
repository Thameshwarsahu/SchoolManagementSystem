<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Log In | School Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="School Management System" name="description" />
    <meta content="Thameshwar sahu" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('SMS.png') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body class="authentication-bg" style="background-image: url({{ asset('assets/images/auth-bg.png') }})">

    <div class="account-pages mt-5 mb-4 pt-sm-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <a href="{{ route('login') }}" class="mb-3 d-block auth-logo">
                            <img src="{{ asset('SMS.png') }}" alt="" height="80" width="100"
                                class="logo logo-dark">
                            <img src="{{ asset('SMS.png') }}" alt="" height="80" width="100"
                                class="logo logo-light">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">

                        <div class="card-body p-3">
                            <div class="text-center mt-2">
                                <h5 style="color:#5a3d3d">Welcome Back !</h5>
                                <p class="text-muted">Sign in to continue to School Management System.</p>
                            </div>
                            <div class="p-2 mt-3">

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
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="Enter email">
                                    </div>

                                    <div class="form-group">
                                        <div class="float-right">
                                            <a href="{{ route('password.request') }}" class="text-muted">Forgot
                                                password?</a>
                                        </div>

                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="Enter password">
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="remember"
                                            id="auth-remember-check">
                                        <label class="custom-control-label" for="auth-remember-check">Remember
                                            me</label>
                                    </div>

                                    <div class="mt-3 text-right">
                                        <button class="btn  btn-block waves-effect waves-light"
                                            style="background-color:#5a3d3d; color:white;" type="submit"><i
                                                class="icon-xs icon mr-1" data-feather="log-in"></i> Log
                                            In</button>
                                    </div>
                                    {{-- <div class="mt-4 text-center">
                                        <p class="mb-0">Don't have an account ? <a href="{{ route('register') }}"
                                                class="font-weight-medium text-primary"> Signup now </a> </p>
                                    </div> --}}

                                    {{-- <div class="mt-4 text-center">
                                        <div class="signin-other-title">
                                            <h5 class="font-size-14 mb-3 title">OR</h5>
                                        </div>

                                        <p class="text-muted mb-3">Continue with social media</p>

                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item mr-1">
                                                <a href="javascript:void()"
                                                    class="social-list-item bg-soft-primary font-size-16 text-primary border-white">
                                                    <i class="uil-facebook-f"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item mr-1">
                                                <a href="javascript:void()"
                                                    class="social-list-item bg-soft-info font-size-16 text-info border-white">
                                                    <i class="uil-twitter"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item mr-1">
                                                <a href="javascript:void()"
                                                    class="social-list-item bg-soft-danger font-size-16 text-danger border-white">
                                                    <i class="uil-google"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript:void()"
                                                    class="social-list-item bg-soft-purple font-size-16 text-purple border-white">
                                                    <i class="uil-linkedin-alt"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div> --}}
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 text-center">
                        <p>© {{ date('Y') }} School Management System. Crafted with <i
                                class="mdi mdi-heart text-danger"></i> by <a
                                href="https://github.com/Thameshwarsahu/SchoolManagementSystem" target="_blank" class="text-reset">Thameshwar sahu</a></p>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>

    <script src="{{ asset('assets/js/app.js') }}"></script>

</body>

</html>
