
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Admin Login</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/admin/new/img/favicon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/new/css/bootstrap.min.css') }}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/new/css/font-awesome.min.csss') }}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/new/css/style.css') }}">


    <!--[if lt IE 9]>
    <script src="{{ asset('assets/admin/new/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('assets/admin/new/js/respond.min.js') }}"></script>

    <![endif]-->
</head>
<body>

<!-- Main Wrapper -->
<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                <div class="login-left">
                    <img class="img-fluid" src="{{ asset('assets/admin/new/img/logo.png') }}" alt="Logo">
                </div>
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1 class="pb-4">Admin Login</h1>

                        <!-- Form -->
                        <form method="POST" action="{{ route('admin.login') }}">
                            @csrf
                            <div class="form-group">
                                <input id="email" placeholder="Enter E-mail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" placeholder="Enter Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">Login</button>
                            </div>
                        </form>
                        <!-- /Form -->
                        <div class="text-center forgotpass"><a href="{{ route('admin.password.request') }}">Forgot Password?</a></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="{{ asset('assets/admin/new/js/jquery-3.2.1.min.js') }}"></script>
<!-- Bootstrap Core JS -->
<script src="{{ asset('assets/admin/new/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/admin/new/js/bootstrap.min.js') }}"></script>
<!-- Custom JS -->
<script src="{{ asset('assets/admin/new/js/script.js') }}"></script>


</body>

</html>

