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
                    <div class="col-lg-10">
                        <div class="card card-primary " style="border-radius:25px ;background-color: #f9f9f9e7;">

                            <div class="card-body ">
                                <div class="login-brand mb-5 mt-1" align="center">
                                    <a href="/"><img src="{{ asset('build/assets/images/organic-3.png') }}" alt="logo" width="150" class="shadow-light "></a>
                                </div>
                                <!-- <h4 align="center">Sign in to your <a href="/"> BioLife</a> account</h4><br><br> -->

                            <form action="{{route('login.registre')}}" method="POST">
                                @csrf
                                <div class="row">

                                    @if(!$errors->has('nom'))
                                    <div class="form-group col-6">
                                        <label for="nom">First Name</label>
                                        <input id="nom" type="text" class="form-control" name="nom">
                                    </div>
                                    @else
                                    <div class="form-group col-6">
                                        <label for="nom" class="text-danger">first name (Erreur)</label>
                                        <input id="nom" type="text" class="form-control is-invalid" name="nom">
                                        <div class="mt-2 text-danger">{{ $errors->first('nom') }}</div>
                                    </div>
                                    @endif
                                    @if(!$errors->has('prenom'))
                                    <div class="form-group col-6">
                                        <label for="prenom">last Name</label>
                                        <input id="prenom" type="text" class="form-control" name="prenom">
                                    </div>
                                    @else
                                    <div class="form-group col-6">
                                        <label for="prenom" class="text-danger">last name (Erreur)</label>
                                        <input id="prenom" type="text" class="form-control is-invalid" name="prenom">
                                        <div class="mt-2 text-danger">{{ $errors->first('prenom') }}</div>
                                    </div>
                                    @endif
                                </div>

                                @if(!$errors->has('email'))
                                <div class="form-group ">
                                    <label for="email">Email</label>
                                    <input id="email" type="text" class="form-control" name="email">
                                </div>
                                @else
                                <div class="form-group ">
                                    <label for="email" class="text-danger">email (Erreur)</label>
                                    <input id="email" type="text" class="form-control is-invalid" name="email">
                                    <div class="mt-2 text-danger">{{ $errors->first('email') }}</div>
                                </div>
                                @endif
                                <div class="row">
                                    @if(!$errors->has('password'))
                                    <div class="form-group col-6">
                                        <label for="password" class="d-block">Password</label>
                                        <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                                        <div id="pwindicator" class="pwindicator">
                                            <div class="bar"></div>
                                            <div class="label"></div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="form-group col-6">
                                        <label for="password" class="d-block text-danger">Password (Erreur)</label>
                                        <input id="password" type="password" class="form-control pwstrength is-invalid" data-indicator="pwindicator" name="password">
                                        <div id="pwindicator" class="pwindicator">
                                            <div class="bar"></div>
                                            <div class="label"></div>
                                        </div>
                                        <div class="mt-2 text-danger">{{ $errors->first('password') }}</div>
                                    </div>
                                    @endif

                                    <div class="form-group col-6">
                                        <label for="password2" class="d-block">Password Confirmation</label>
                                        <input id="password2" type="password" class="form-control" name="password_confirmation">
                                    </div>
                                </div>
                                <div class="form-divider">Your Home</div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        @if(!$errors->has('ville'))
                                        <label for="ville">City</label>
                                        <input type="text" name="ville" class="form-control">
                                        @else
                                        <label for="ville" class="text-danger">City (Erreur)</label>
                                        <input type="text" name="ville"  class="form-control is-invalid">
                                        <div class="mt-2 text-danger">{{ $errors->first('ville') }}</div>
                                        @endif

                                    </div>
                                    <div class="form-group col-6">
                                        @if(!$errors->has('tel'))
                                        <label for="tel">Phone</label>
                                        <input type="text" name="tel" class="form-control">
                                        @else
                                        <label for="tel" class="text-danger">Phone (Erreur)</label>
                                        <input type="text" name="tel"  class="form-control is-invalid">
                                        <div class="mt-2 text-danger">{{ $errors->first('tel') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-12">
                                        @if(!$errors->has('adresse'))
                                        <label for="adresse">Adresse</label>
                                        <input type="text" name="adresse" class="form-control">
                                        @else
                                        <label for="adresse" class="text-danger">Adresse (Erreur)</label>
                                        <input type="text" name="adresse" class="form-control is-invalid">
                                        <div class="mt-2 text-danger">{{ $errors->first('adresse') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <input type="text" hidden name="isAdmin" value="0">
                                <div class="form-group text-left">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                                        <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" style="background-color: #e7391e;border-color: #e7391e;" class="btn btn-primary btn-lg btn-block"><h5>Signup</h5></button>
                                </div>
                            </form>

                         <h5> <p align="center"> A lready have Account ? <a href="{{route('login')}}" style="color: #e7391e;"><b>Login</b></a></p> </h5>
                        </div>
                        </div>
                        </div>
                      

                    </div>
                </center>
            </div>
        </section>
    </div>
</body></html>