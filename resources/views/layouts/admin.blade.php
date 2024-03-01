<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.assets.css')
    <link rel="stylesheet" href="{{ asset( 'css/style.css' ) }}">
    <link rel="stylesheet" href="{{ asset( 'css/style-mobile.css' ) }}">
</head>
<body>

<!-- Start Header -->
@include('layouts.admin.header')
<!-- end header -->

<!-- Start main -->
<main>
    <div class="main-container">
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <div class="col-auto col-md-3 col-xl-2 sidebar vh-100">
                    @include('layouts.admin.sidebar')
                </div>
                <div class="col py-3">
                    @include('flash::message')
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</main>
<!-- End main -->


<!-- Start Footer -->
@include('layouts.include.footer')
<!-- End footer -->

<!-- Scripts -->
@include('layouts.assets.js')
@stack('scripts')
</body>
</html>
