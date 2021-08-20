<!DOCTYPE html>
<html lang="en" dir="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ZYX Admin Panel Login</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/public') }}/src/assets/styles/css/themes/dark-purple.min.css">
<style>
.auth-logo img {
width: 260px;
}
</style>
</head>

<body class="text-left">
    <div class="auth-layout-wrap" style="background-image: url({{ url('/public') }}/src/assets/images/photo-wide-4.jpg)">
        <div class="auth-content">
            <div class="card o-hidden">
                <div class="row">
                    <div class="col-md-6">
                        <div class="p-4">
                            <div class="auth-logo text-center mb-4">
                                <img src="{{url('/public/image/')}}/header.png" alt="">
                            </div>
                            <h1 class="mb-3 text-18">Sign Up</h1>

<form action="{{ url('/signup') }}" method="POST">

@if ($message = session("message"))
  <div class="alert alert-danger" role="alert">
  {{$message}}
</div>
@endif
@csrf

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="text" class="form-control form-control-rounded" name="name" type="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input id="email" class="form-control form-control-rounded" name="email" type="email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" class="form-control form-control-rounded" name="password" type="password">
                                </div>
                                <div class="form-group">
                                    <label for="cpassword">Confirm Password</label>
                                    <input id="cpassword" class="form-control form-control-rounded" name="password_confirmation" type="password">
                                </div>
                                <button class="btn btn-rounded btn-primary btn-block mt-2">Sign Up</button>

                            </form>

                            <div class="mt-3 text-center">
                                <a href="{{ url('/login') }}" class="text-muted"><u>Login</u></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-center " style="background-size: cover;background-image: url({{ url('/public') }}/src/assets/images/photo-long-3.jpg)">
                        

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('/public') }}/src/assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="{{ url('/public') }}/src/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/public') }}/src/assets/js/es5/script.min.js"></script>
</body>

</html>