@extends('layouts.admin')
@section('title','Countries List')
@section('content')
    <x-card cardTitle="Countries List">
        <x-slot name="cardButtons">
            @permissionTo('country_create')
             <x-nav-link href="{{route('admin.countries.create')}}" label="<i class='bi bi-plus-lg'></i> Add Country" class="btn bg-danger btn-sm text-white"/>
            @endpermissionTo
        </x-slot>

        <x-table>

            <!-- table headers -->
            <x-slot name="thead">
                <th class="col-first">#</th>
                <th>Name</th>
                <th>Acronym</th>
                <th>Currency Code</th>
                <th>Phone Code}</th>
                <th class="col-last"><i class="bi bi-gear"></i></th>
            </x-slot>

            @foreach ($countries as $country)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-start">{{ $country->name }}</td>
                    <td class="text-center">{{ $country->iso }}</td>
                    <td class="text-center">{{ $country->currency_code }}</td>
                    <td class="text-center">{{ $country->phone_code }}</td>
                    <td class="text-center">
                        <div class="btn-group dropstart">
                            <button type="button" class="btn btn-link btn-sm text-dark" style=".btn:hover{border:0;}"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                                @permissionTo('country_update')
                                <a href="{{route('admin.countries.edit',$country)}}" class="dropdown-item">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <div class="dropdown-divider"></div>
                                @endpermissionTo
                                @permissionTo('country_delete')
                                <form method="POST" action="{{route('admin.countries.destroy',$country)}}"
                                      class="form-horizontal" role="form" autocomplete="off">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-block btn-del"
                                            onclick="return confirm('Confirm to delete?')">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                                @endpermissionTo
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach

        </x-table>


    </x-card>

@endsection
