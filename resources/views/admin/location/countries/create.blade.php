@extends('layouts.admin')
@section('title','New Country')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <x-card cardTitle="New Country">
                <!-- Start form -->
                <x-form action="{{route('admin.countries.store')}}">
                    @include('admin.location.countries._form')
                </x-form>
            </x-card>
        </div>
    </div>

@endsection
