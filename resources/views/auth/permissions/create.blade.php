@extends('layouts.admin')
@section('title','New User Permission')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-card cardTitle="New User Permission">
                <!-- Start form -->
                <x-form action="{{route('admin.permissions.store')}}">
                    @include('auth.permissions._form')
                </x-form>
            </x-card>
        </div>
    </div>

@endsection
