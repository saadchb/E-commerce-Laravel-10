<!DOCTYPE html>
<html lang="en">

<!-- auth-login.html  Tue, 07 Jan 2020 03:39:47 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login </title>
    <link rel="icon" href="{{ asset('build/assets/images/image.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/modules/fontawesome/css/all.min.css')}}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{asset('assets/modules/bootstrap-social/bootstrap-social.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('build/assets/css/style.css')}}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/components.min.css')}}">
        <style>
                   .layout-4 {
            background-image: url("{{asset('build/assets/images/home-03/AuthBanner.jpg')}}");
            /* position: absolute; */

            background-size: cover;
        }
        </style>
</head>

<body class="layout-4">

    <div id="app">
    <section class="section">
            <div class="container mt-3  ">
                <center class="mb-3">
                    <div class="col-lg-6">
                        <div class="card card-primary " style="border-radius:25px ;background-color: #f9f9f9e7;">

                            <div class="card-body ">
                                <div class="login-brand mb-3 mt-1" align="center">
                                    <a href="/"><img src="{{ asset('build/assets/images/organic-3.png') }}" alt="logo" width="150" class="shadow-light "></a>
                                </div>
                                <!-- <h4 align="center">Sign in to your <a href="/"> BioLife</a> account</h4><br><br> -->

                                <form method="POST"  action="{{route('login')}}" novalidate="">

                                    @csrf <!-- cross-site-request-forgery -->
                                    <div class="form-group text-left">
                                        <label style="font-size: small ;color:black " for="email">Email</label>
                                        <input id="email" type="email" class="form-control mb-2" name="email" tabindex="1" value="{{old('email')}}">
                                        @error('email')
                                        <span class="text-danger "> {{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group text-left">
                                        <div class="d-block">
                                            <label style="font-size: small ;color:black " for="password" class="control-label">Password</label>
                                            <div class="float-right">
                                                <a href="auth-forgot-password.html" class="text-medium text-dark">
                                                    Forgot Password?
                                                </a>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-white">
                                                    <i style="cursor: pointer;" class="fa fa-eye" id="togglePassword"></i>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="invalid-feedback text-left">
                                            please fill in your password
                                        </div>
                                    </div>
                                    <div class="form-group text-left">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox"  name="remember" class="custom-control-input " tabindex="3" id="remember-me">
                                            <label class="custom-control-label" for="remember-me">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="form-group  wrap-btn">
                                        <!-- <button type="submit" class=" btn-lg btn-block" >
                                            Login
                                        </button> -->
                                        <button class="btn btn-submit btn-bold" style="background-color: #e7391e;padding: 15px 50px 15px 50px; " tabindex="4" type="submit">sign in</button>

                                    </div>
                                </form>
                                <div class="text-center mt-4 mb-3">
                                    <div class="text-job text-dark">Login With Social</div>
                                </div>
                                <div class="row sm-gutters ">
                                    <div class="col-6">
                                        <a class="btn btn-block btn-social btn-facebook " style="background-color: blue;"><span class="fab fa-facebook"></span> Facebook</a>
                                    </div>
                                    <div class="col-6">
                                        <a class="btn btn-block btn-social btn-google bg-primary" ><span class="fab fa-google"></span> Google</a>
                                    </div>
                                </div><bR>
                         <h5> <p align="center"> Don't have Account ? <a href="/Registre" style="color: #e7391e;"><b>Create one</b></a></p> </h5>

                            </div>
                        </div>
                        <!-- <div class="mt-2 text-muted text-center" style="font-size: larger ;">
                            Don't have an account? <a href="/Registre"><b>Create One</b></a>
                        </div> -->

                    </div>
                </center>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{asset('assets/bundles/lib.vendor.bundle.js')}}"></script>
    <script src="{{asset('js/CodiePie.js')}}"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->  
    <script>
    $(document).ready(function() {
        $("#togglePassword").click(function() {
            var passwordField = $("#password"); // Corrected
            var passwordFieldType = passwordField.attr('type');
            if (passwordFieldType == 'password') {
                passwordField.attr('type', 'text');
                $(this).removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                passwordField.attr('type', 'password');
                $(this).removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });
    });
</script>
    <!-- Template JS File -->
    <script src="{{asset('js/scripts.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
</body>

<!-- auth-login.html  Tue, 07 Jan 2020 03:39:47 GMT -->

</html>