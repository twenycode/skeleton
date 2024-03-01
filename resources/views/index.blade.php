@extends('layouts.app')
@section('content')

    <div class="front-home">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center">
                <h1> Unsubscribe from Subscription Chaos</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-10 text-center">
                <h2> Focus on your business goals, don't let subscriptions stress you out. <strong>Unsubscribe today</strong></h2>
            </div>
        </div>
        @guest
            <div class="row justify-content-center mt-2">
                <div class="col-md-6 col-8 text-center">
                    <a class="btn btn-danger btn-lg" href="{{route('register')}}">
                        Get Started <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        @endguest
    </div>

@endsection
