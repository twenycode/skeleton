@extends('layouts.admin')
@section('title','List of Users Permissions')
@section('content')
    <x-card cardTitle="List of Users Permissions">
        <x-slot name="cardButtons">
            @permissionTo('permission_create')
                <x-nav-link href="{{route('admin.permissions.create')}}"
                        label="<i class='bi bi-plus-lg'></i> Add Permission" class="btn bg-danger btn-sm text-white"/>
            @endpermissionTo
        </x-slot>

        <x-table>

            <!-- table headers -->
            <x-slot name="thead">
                <th class="col-first">#</th>
                <th>Permission name</th>
                <th>Group</th>
                <th>Descriptions</th>
                <th>Roles</th>
                <th class="col-last"><i class="bi bi-gear"></i></th>
            </x-slot>

            @foreach ($permissions as $permission)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-left">{{ $permission->name }}</td>
                    <td class="text-center">{{ $permission->group_name }}</td>
                    <td class="text-left">{{ $permission->descriptions }}</td>
                    <td class="text-center">
                        <ul class="list list-inline">
                            @foreach($permission->role as $role)
                                <li class="list-inline-item">{{$role->name.' , '}} </li>
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
                                @permissionTo('permission_update')
                                <a href="{{route('admin.permissions.edit',$permission)}}" class="dropdown-item">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <div class="dropdown-divider"></div>
                                @endpermissionTo
                                @permissionTo('permission_delete')
                                <form method="POST" action="{{route('admin.permissions.destroy',$permission)}}"
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
