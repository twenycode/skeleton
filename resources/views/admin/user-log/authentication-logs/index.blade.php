@extends('layouts.admin')
@section('title','List of User Logins')
@section('content')
    <x-card cardTitle="List of User Logins">

        <x-table>
            <!-- table headers -->
            <x-slot name="thead">
                <th class="col-first w-5">#</th>
                <th class="col-last  w-10">User</th>
                <th class="col-last  w-10">IP Address</th>
                <th class="col-last  w-15">Login at</th>
                <th class="col-last  w-15">Status</th>
                <th class="col-last  w-15">Logout at</th>
                <th class="col-last  w-15">User Agent</th>
                <th class="col-last  w-5"><i class="bi bi-gear"></i></th>
            </x-slot>

            @foreach ($authenticationLogs as $authenticationLog)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-start">{{ $authenticationLog->user->name }} </td>
                    <td class="text-center">{{ $authenticationLog->ip_address }} </td>
                    <td class="text-center">{{ $authenticationLog->login_time }} </td>
                    <td class="text-center">{!! $authenticationLog->log_success !!} </td>
                    <td class="text-center">{{ $authenticationLog->logout_time }} </td>
                    <td class="text-center">{!! $authenticationLog->user_agent_details !!} </td>
                    <td class="text-center">
                        <a class="text-dark" href="{{route('admin.authentication-logs.show',$authenticationLog)}}"
                           title="View"><i class="bi bi-eye"></i></a>
                    </td>
                </tr>

            @endforeach

        </x-table>

    </x-card>
@endsection
