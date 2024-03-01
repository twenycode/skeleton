@extends('layouts.admin')
@section('title','Update Administrator')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-card cardTitle="Update Administrator">
                {{ Form::model($admin, array('route' => array('admin.admins.update',$admin), 'method' => 'PUT')) }}
                @include('auth.admins._form')
                {{Form::close()}}
            </x-card>
        </div>
    </div>

@endsection

