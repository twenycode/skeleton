@extends('layouts.auth')
@section('title','Please login')
@section('content')

    <form method="POST" action="{{ route('login') }}" class="g-3" >
        @csrf
        <div class="text-center mb-3 pb-3">
            <h2 class="fw-normal" style="letter-spacing: 1px;">
                Sign in to your @include('layouts.include.logo',['width'=>'25%']) account
            </h2>
            <p>Enter your details.</p>
        </div>

        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
        <div class="mb-3">
            <x-label for="email / Username" star="true" />
            <x-input name="email" required />
            <x-error field="email" />
        </div>
        <div class="mb-3">
            <x-label for="password" star="true" />
            <x-input type="password" name="password" required />
            <x-error field="password" />
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <x-button class="btn btn-danger btn-block w-100" label="Sign In" />
            </div>
        </div>
        <a class="small text-muted" href="#!">Forgot password?</a>
        <p class="mb-5 pb-lg-2">Don't have an account?
            <a href="{{route('register')}}" style="color: #393f81;">Register here</a>
        </p>
    </form>

@endsection


