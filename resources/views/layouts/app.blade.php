<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.assets.css')
    <link rel="stylesheet" href="{{ asset( 'css/style.css' ) }}">
    <link rel="stylesheet" href="{{ asset( 'css/style-mobile.css' ) }}">
</head>
<body>

<!-- Start Header -->
@include('layouts.public.header')
<!-- end header -->

<!-- Start main -->
<main>
    <div class="main-container">
        <div class="container">
            @yield('content')
        </div>
    </div>
</main>
<!-- End main -->


<!-- Start Footer -->
@include('layouts.include.footer')
<!-- End footer -->

<!-- Scripts -->
@include('layouts.assets.js')

</body>
</html>
