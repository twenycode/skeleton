@extends('layouts.admin')
@section('title','New User Role')
@section('content')

    @include('flash::message')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <x-card cardTitle="New User Role">
                <!-- Start form -->
                <x-form action="{{route('admin.roles.store')}}">
                    @include('auth.roles._form')
                </x-form>
            </x-card>
        </div>
    </div>

@endsection
