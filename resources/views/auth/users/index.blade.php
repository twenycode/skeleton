@extends('layouts.admin')
@section('title','Public Users')
@section('content')

    <x-card cardTitle="List of public users">
        <x-slot name="cardButtons">
            @permissionTo('user_create')
            <x-nav-link href="{{route('admin.users.create')}}"
                        label="<i class='bi bi-plus-lg'></i> Add Public User"
                        class="btn bg-danger btn-sm text-white"/>
            @endpermissionTo
        </x-slot>

        <x-table class="table-hover">
            <!-- table headers -->
            <x-slot name="thead">
                <th class="col-first">#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Verified</th>
                <th>Active</th>
                <th>Last Login</th>
                <th class="col-last"><i class="bi bi-gear"></i></th>
            </x-slot>
            @foreach ($users as $user)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-left">{{ $user->name }}</td>
                    <td class="text-center">{{ $user->email }}</td>
                    <td class="text-center">{!! $user->verified !!}</td>
                    <td class="text-center">{!! $user->active !!}</td>
                    <td class="text-center">
                        {{humanDateTime($user->latestAuthentication['login_at'])}}
                    </td>
                    <td class="text-center">
                        <div class="btn-group dropstart">
                            <button type="button" class="btn btn-link btn-sm text-dark" style=".btn:hover{border:0;}"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                                @permissionTo('user_update')
                                    <a href="{{route('admin.users.edit',$user)}}" class="dropdown-item">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <div class="dropdown-divider"></div>
                                @endpermissionTo
                                @permissionTo('user_delete')
                                    <form method="POST" action="{{route('admin.users.destroy',$user)}}" class="form-horizontal"
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
