@extends('layouts.admin')
@section('title','List of Administrators')
@section('content')

    <x-card cardTitle="List of Administrators">
        <x-slot name="cardButtons">
            @permissionTo('admin_create')
            <x-nav-link href="{{route('admin.admins.create')}}"
                        label="<i class='bi bi-plus-lg'></i> Add Administrator"
                        class="btn bg-danger btn-sm text-white"/>
            @endpermissionTo
        </x-slot>

        <x-table class="table-hover">
            <!-- table headers -->
            <x-slot name="thead">
                <th class="col-first">#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Email Verified</th>
                <th>Active</th>
                <th>Last Login</th>
                <th>Roles</th>
                <th class="col-last"><i class="bi bi-gear"></i></th>
            </x-slot>
            @foreach ($admins as $admin)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-left">{{ $admin->name }}</td>
                    <td class="text-center">{{ $admin->email }}</td>
                    <td class="text-center">{!! $admin->verified !!}</td>
                    <td class="text-center">{!! $admin->active !!}</td>
                    <td class="text-center">
                        {{humanDateTime($admin->latestAuthentication['login_at'])}}
                    </td>
                    <td class="text-center">
                        @foreach($admin->role as $role)
                            <li class="list-inline-item">{{$role->name.' , '}} </li>
                        @endforeach
                    </td>
                    <td class="text-center">
                        <div class="btn-group dropstart">
                            <button type="button" class="btn btn-link btn-sm text-dark" style=".btn:hover{border:0;}"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                                @permissionTo('admin_update')
                                    <a href="{{route('admin.admins.edit',$admin)}}" class="dropdown-item">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <div class="dropdown-divider"></div>
                                @endpermissionTo
                                @permissionTo('admin_delete')
                                <form method="POST" action="{{route('admin.admins.destroy',$admin)}}" class="form-horizontal"
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
