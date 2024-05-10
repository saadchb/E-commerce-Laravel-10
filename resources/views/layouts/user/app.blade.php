<!DOCTYPE html>
<html lang="en">

<!--   Tue, 07 Jan 2020 03:33:27 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>E-commerce | @yield('title')</title>
    <!-- general CSS -->
    @include('layouts.user.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />



</head>

<body class="layout-4">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>



    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <!-- Start app top navbar -->
            @include('layouts.user.nav')

            <!-- Start main left sidebar menu -->

            @include('layouts.user.sidebar')
    




            <!-- Start app main Content -->
            <div class="main-content">
                @yield('content')
            </div>

            <!-- Start app Footer part -->
            @include('layouts.user.footer')
        </div>
    </div>

    @include('layouts.user.js')

</body>

<!--   Tue, 07 Jan 2020 03:35:12 GMT -->

</html>