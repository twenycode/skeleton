@extends('layouts.admin')
@section('title','View User Login')
@section('content')
    <x-card cardTitle="View User Login">

        <x-slot name="cardButtons">
            <x-nav-link href="{{url()->previous()}}" label="Return" class="btn btn-warning"/>
        </x-slot>

        <table class="table table-bordered">
            <tbody>
            <tr>
                <th class="w-15">User</th>
                <td>{{$authenticationLog->user->name}}</td>
            </tr>
            <tr>
                <th>IP Address</th>
                <td>{{$authenticationLog->ip_address}}</td>
            </tr>
            <tr>
                <th>Login at</th>
                <td>{{$authenticationLog->login_time}}</td>
            </tr>
            <tr>
                <th>Login Succes</th>
                <td>{!!  $authenticationLog->log_success !!}</td>
            </tr>
            <tr>
                <th>Logout at</th>
                <td>{{$authenticationLog->logout_time}}</td>
            </tr>
            <tr>
                <th>User Agent</th>
                <td>{{$authenticationLog->platform.' - '.$authenticationLog->browser}}</td>
            </tr>

            </tbody>
        </table>

    </x-card>

@endsection
