@extends('layouts.admin')
@section('title','View User Activity Log')
@section('content')
    <x-card cardTitle="View User Activity Log">

        <x-slot name="cardButtons">
            <x-nav-link href="{{url()->previous()}}" label="Return" class="btn btn-warning"/>
        </x-slot>

        <table class="table table-bordered">
            <tbody>
            <tr>
                <th>User</th>
                <td>{{$activityLog->user->name}}</td>
            </tr>
            <tr>
                <th>Action</th>
                <td>{{$activityLog->description}}</td>
            </tr>
            <tr>
                <th>Table</th>
                <td>{!! str_replace('App\Models\\', '', $activityLog->subject_type)  !!}</td>
            </tr>
            <tr>
                <th>Date</th>
                <td>{{$activityLog->date}}</td>
            </tr>
            <tr>
                <th>IP Address</th>
                <td>{{$activityLog->ip_address}}</td>
            </tr>
            <tr>
                <th>User Agent</th>
                <td>{{$activityLog->user_agent}}</td>
            </tr>
            <tr>
                <th>URL</th>
                <td>{{$activityLog->url}}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>
                    {{ $activityLog->data }}
                </td>
            </tr>

            </tbody>
        </table>

    </x-card>

@endsection
