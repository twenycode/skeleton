@extends('layouts.admin')
@section('title','List of User Roles')
@section('content')

    <x-card cardTitle="List of User Roles">
        <x-slot name="cardButtons">
            @permissionTo('role_create')
                <x-nav-link href="{{route('admin.roles.create')}}" label="<i class='bi bi-plus-lg'></i> Add Role" class="btn bg-danger btn-sm text-white"/>
            @endpermissionTo
        </x-slot>

        <x-table class="table-hover">
            <!-- table headers -->
            <x-slot name="thead">
                <th class="col-first">#</th>
                <th>Role name</th>
                <th>Descriptions</th>
                <th>Permissions</th>
                <th class="col-last"><i class="bi bi-gear"></i></th>
            </x-slot>

            @foreach ($roles as $role)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-left">{{ $role->name }}</td>
                    <td class="text-left">{{ $role->descriptions }}</td>
                    <td class="text-center">
                        <ul class="list list-inline">
                            @foreach($role->permission as $permission)
                                <li class="list-inline-item">{{$permission->name.' , '}} </li>
                            @endforeach
                        </ul>
                    </td>
                    <td class="text-center">
                        <div class="btn-group dropstart">
                            <button type="button" class="btn btn-link btn-sm text-dark" style=".btn:hover{border:0;}"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                                @permissionTo('role_update')
                                <a href="{{route('admin.roles.edit',$role)}}" class="dropdown-item">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <div class="dropdown-divider"></div>
                                @endpermissionTo
                                @permissionTo('role_delete')
                                    <form method="POST" action="{{route('admin.roles.destroy',$role)}}" class="form-horizontal"
                                          role="form" autocomplete="off">
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
