<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="page-content">

    @include('layouts.alerts')

    <!-- Content Wrapper. Contains page content -->
    <div class="wrapper">
        <div class="content d-flex justify-content-center align-items-center">

            <!-- Login form -->
            <form method="POST" class="login-form" action="{{route('register.store')}}">
                @method('POST')
                @csrf
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                            <h5 class="mb-0">Register</h5>
                            <!-- __ - Берет значения из файла локализации ('resources/lang/en/public') -->
                            <span class="d-block text-muted">Enter your credentials below</span>
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input id="name" type="text"
                                   class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   placeholder="{{ __('Name') }}" name="name" value="{{ old('name') }}" required
                                   autofocus>
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input id="login" type="text"
                                   class="form-control {{ $errors->has('login') ? ' is-invalid' : '' }}"
                                   placeholder="{{ __('Login') }}" name="login" value="{{ old('login') }}" required
                                   autofocus>
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input id="password" type="password"
                                   class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password" placeholder="{{ __('Password') }}" required>
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input id="password_confirmation" type="password"
                                   class="form-control"
                                   name="password_confirmation" placeholder="Confirm Password" required>
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-dark btn-block">
                                {{ __('Register') }}<i class="icon-circle-right2 ml-2"></i>
                            </button>
                        </div>

                    </div>
                </div>
            </form>
            <!-- /login form -->

        </div>
    </div>

    <footer class="main-footer">
        <strong>If you have an account  <a href="{{route('login.index')}}">Login Now</a>.</strong>

    </footer>
    <!-- /.content-wrapper -->
</div>
</body>
</html>

