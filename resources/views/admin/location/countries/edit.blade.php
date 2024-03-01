@extends('layouts.admin')
@section('title','Update Country')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <x-card cardTitle="Update Country">
                {{ Form::model($country, array('route' => array('admin.countries.update',$country), 'method' => 'PUT')) }}
                @include('admin.location.countries._form',['buttonText'=>'Update'])
                {{Form::close()}}
            </x-card>
        </div>
    </div>

@endsection
