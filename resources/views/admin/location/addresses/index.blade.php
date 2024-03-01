@extends('layouts.admin')
@section('title','Addresses List')
@section('content')
    <x-card cardTitle="Addresses List">
        <x-table>
            <!-- table headers -->
            <x-slot name="thead">
                <th class="col-first">#</th>
                <th>Name</th>
                <th>Type</th>
                <th>Latitude</th>
                <th>Longitude</th>
            </x-slot>
            @foreach ($addresses as $address)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-start">{{ $address->name }}</td>
                    <td class="text-start">{{ $address->addressable_type }}</td>
                    <td class="text-center">{{ $address->latitude }}</td>
                    <td class="text-center">{{ $address->longitude }}</td>
                </tr>
            @endforeach
        </x-table>
    </x-card>
@endsection
