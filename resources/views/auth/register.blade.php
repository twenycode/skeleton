@extends('layouts.auth')
@section('title','Get Stated')
@section('content')
<div class="container">
    <form method="POST" action="{{ route('register') }}" class="" >
        @csrf
            <div class="text-center  mb-3 pb-3">
                <h2 class="fw-normal" style="letter-spacing: 1px;">
                    Welcome to @include('layouts.include.logo',['width'=>'25%'])
                </h2>
                <p>Get started - it's free. No credit card needed.</p>
            </div>

            <div class="mb-3">
                <x-label for="full name" star="true" />
                <x-input name="name" required />
                <x-error field="name" />
            </div>
            <div class="mb-3">
                <x-label for="Email address" star="true" />
                <x-input name="email" required />
                <x-error field="email" />
            </div>
            <div class="mb-3">
                <x-label for="password" star="true" />
                <x-input type="password" name="password" required />
                <x-error field="password" />
            </div>
            <div class="mb-3">
                <x-label for="Confirm Password" star="true" />
                <x-input type="password" name="password_confirmation" required />
                <x-error field="password" />
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <x-button class="btn btn-danger btn-block w-100" label="Register" />
                </div>
            </div>
            <p class="mb-5 pb-lg-2">Have an account?
                <a href="{{route('login')}}" style="color: #393f81;">Sing in</a>
            </p>
        </form>
    </div>
@endsection
