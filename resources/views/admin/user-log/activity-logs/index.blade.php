@extends('layouts.admin')
@section('title','User Activity Logs')
@section('content')
    <x-card cardTitle="User Activity Logs">

        <x-table>
            <!-- table headers -->
            <x-slot name="thead">
                <th class="col-first w-5">#</th>
                <th class="col-last  w-10">User</th>
                <th class="col-last  w-10">Action</th>
                <th class="col-last  w-10">Table</th>
                <th class="col-last  w-15">Date</th>
                <th class="col-last  w-10">IP Address</th>
                <th class="col-last  w-15">User Agent</th>
                <th class="col-last  w-20">URL</th>
                <th class="col-last  w-5"><i class="bi bi-gear"></i></th>
            </x-slot>

            @foreach ($activityLogs as $activityLog)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center ">{{ $activityLog->user->name }} </td>
                    <td class="text-center">{!! $activityLog->description !!} </td>
                    <td class="text-center">{!! str_replace('App\Models\\', '', $activityLog->subject_type)  !!} </td>
                    <td class="text-center">{{ $activityLog->date }} </td>
                    <td class="text-center">{{ $activityLog->ip_address }} </td>
                    <td class="text-center">{{ $activityLog->user_agent_details }} </td>
                    <td class="text-start">{{ $activityLog->url }} </td>
                    <td class="text-center">
                        <a class="text-dark" href="{{route('admin.activity-logs.show',$activityLog)}}" title="View"><i
                                    class="bi bi-eye"></i></a>
                    </td>
                </tr>

            @endforeach

        </x-table>
    </x-card>

@endsection
