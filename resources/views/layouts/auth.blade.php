<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.assets.css')
    <link rel="stylesheet" href="{{ asset( 'css/style.css' ) }}">
    <link rel="stylesheet" href="{{ asset( 'css/style-mobile.css' ) }}">
</head>
<body>
<main>
    <div class="container pt-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block bg-danger">
                            word
                        </div>
                        <!-- start right auth -->
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                                @yield('content')
                                <a href="#!" class="small text-muted">Terms of use.</a>
                                <a href="#!" class="small text-muted">Privacy policy</a>
                            </div>
                        </div>
                        <!-- end right auth -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Start main -->
{{--<main>--}}
{{--    <div class="container">--}}
{{--        <div class="auth-content">--}}
{{--            <div class="row auth">--}}
{{--                <div class="col-lg-5 col-md-5 col-12 auth-form">--}}
{{--                    <!-- start logo -->--}}
{{--                    @include('layouts.include.logo',['width'=>'20%'])--}}
{{--                    <!-- end logo -->--}}
{{--                    @yield('content')--}}
{{--                </div>--}}
{{--                <div class="col-lg-7 col-md-7 col-12 auth-info">--}}
{{--                    dgsdgf--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @include('layouts.include.footer')--}}
{{--    </div>--}}
{{--</main>--}}
<!-- End main -->


<!-- Start Footer -->
{{--    @include('layouts.include.footer')--}}
<!-- End footer -->


<!-- Scripts -->
@include('layouts.assets.js')
</body>
</html>
