@extends('layouts.admin')
@section('title', 'Update User Permission' )
@section('content')
    @include('flash::message')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-card cardTitle="Update User Permission">
                {{ Form::model($permission, array('route' => array('admin.permissions.update',$permission), 'method' => 'PUT')) }}
                @include('auth.permissions._form',['buttonText'=> 'Update'])
                {{Form::close()}}
            </x-card>
        </div>
    </div>

@endsection
