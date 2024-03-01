@extends('layouts.admin')
@section('title','New Administrator')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-card cardTitle="New Administrator">
                <x-form action="{{route('admin.admins.store')}}">
                    @include('auth.admins._form')
                </x-form>
            </x-card>
        </div>
    </div>


@endsection
