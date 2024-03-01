@extends('layouts.admin')
@section('title','Update role')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <x-card cardTitle="Update role">
                {{ Form::model($role, array('route' => array('admin.roles.update',$role), 'method' => 'PUT')) }}
                @include('auth.roles._form',['buttonText'=>'Update'])
                {{Form::close()}}
            </x-card>
        </div>
    </div>

@endsection
