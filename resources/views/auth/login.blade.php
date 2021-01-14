<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('sufee-admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sufee-admin/vendors/font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('sufee-admin/assets/css/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-form items-center">
                    <div class="login-logo">
                        <h1 class="text-dark font-weight-bold">Login</h1>
                    </div>
                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible">
                        {{ session('error') }}
                        <button class="close" data-dismiss="alert">&times;</button>
                    </div>
                    @endif
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="Email" value="{{ old('email') }}" autofocus>

                            @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" placeholder="Password">

                            @error('password')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="checkbox form-group">
                            <label>
                                <input type="checkbox" name="remember">&nbsp; Remember Me
                            </label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success rounded">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('sufee-admin/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('sufee-admin/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>

</body>

</html>
