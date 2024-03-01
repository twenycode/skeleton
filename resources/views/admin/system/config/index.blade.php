@extends('layouts.admin')
@section('title','System Configurations')
@section('content')

    <x-card cardTitle="System Configurations">
        <div class="row table-config">

            <!--======================= APPLICATIONCONFIGURATIONS SETTINGS ===========================-->
            <div class="col-md-6">
                <x-card cardTitle="Application Config">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th>APP Name</th>
                            <td>{{env('APP_NAME')}}</td>
                        </tr>
                        <tr>
                            <th>APP Environment</th>
                            <td>{{env('APP_ENV')}}</td>
                        </tr>
                        <tr>
                            <th>APP Debug</th>
                            <td>
                                @if(env('APP_DEBUG'))
                                    true
                                @else
                                    flase
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>APP URL</th>
                            <td>{{env('APP_URL')}}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end">
                                @permissionTo('config_create')
                                <x-nav-link href="{{route('admin.configs.app.edit')}}"
                                            label="<i class='bi bi-pencil-square'></i> update"
                                            class="btn btn-outline-danger btn-sm"/>
                                <br/>
                                @endpermissionTo
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </x-card>
            </div>
        </div>

        <div class="row table-config">
            <!--======================= DATABASE CONFIGURATIONS SETTINGS ===========================-->
            <div class="col-md-6">
                <x-card cardTitle="Database Configuration">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th>DB Connection</th>
                            <td>{{env('DB_CONNECTION')}}</td>
                        </tr>
                        <tr>
                            <th>DB Host</th>
                            <td>{{env('DB_HOST')}}</td>
                        </tr>
                        <tr>
                            <th>DB Port</th>
                            <td>{{env('DB_PORT')}}</td>
                        </tr>
                        <tr>
                            <th>DB Name</th>
                            <td>{{env('DB_DATABASE')}}</td>
                        </tr>
                        <tr>
                            <th>DB Username</th>
                            <td>{{env('DB_USERNAME')}}</td>
                        </tr>
                        <tr>
                            <th>DB Password</th>
                            <td>
                                @if(env('DB_PASSWORD'))
                                    <input type="password" id="password" name="password" value="{{env('DB_PASSWORD')}}"
                                           readonly style="border: none;">
                                    <button type="button" id="toggle-password" class="btn btn-outline-secondary btn-sm">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                @else
                                    NOT SET
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>DB Dump Binary path</th>
                            <td>{{env('DB_DUMP_BINARY_PATH')}}</td>
                        </tr>

                        <tr>
                            <td colspan="2" class="text-end">
                                @permissionTo('config_create')
                                <x-nav-link href="{{route('admin.configs.db.edit')}}"
                                            label="<i class='bi bi-pencil-square'></i> update"
                                            class="btn btn-outline-danger btn-sm"/>
                                <br/>
                                @endpermissionTo
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </x-card>
            </div>

            <!----------------------------- EMAIL CONFIGURATIONS SETTINGS ----------------------------->
            <div class="col-md-6">
                <x-card cardTitle="Email Configuration">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Mail Driver</th>
                                <td>{{env('MAIL_MAILER')}}</td>
                            </tr>
                            <tr>
                                <th>Mail Host</th>
                                <td>{{env('MAIL_HOST')}}</td>
                            </tr>
                            <tr>
                                <th>Mail Port</th>
                                <td>{{env('MAIL_PORT')}}</td>
                            </tr>
                            <tr>
                                <th>Mail Username</th>
                                <td>{{env('MAIL_USERNAME')}}</td>
                            </tr>
                            <tr>
                                <th>Mail Password</th>
                                <td>
                                    @if(env('MAIL_PASSWORD'))
                                        <input type="password" id="password" name="password"
                                               value="{{env('MAIL_PASSWORD')}}" readonly style="border: none;">
                                        <button type="button" id="toggle-password" class="btn btn-outline-secondary btn-sm">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    @else
                                        NOT SET
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Mail Encryption</th>
                                <td>{{env('MAIL_ENCRYPTION')}}</td>
                            </tr>
                            <tr>
                                <th>From Email Address</th>
                                <td>{{env('MAIL_FROM_ADDRESS')}}</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-end">
                                    @permissionTo('config_create')
                                    <x-nav-link href="{{route('admin.configs.email.edit')}}"
                                                label="<i class='bi bi-pencil-square'></i> update"
                                                class="btn btn-outline-danger btn-sm"/>
                                    <br/>
                                    @endpermissionTo
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </x-card>
            </div>

{{--            <div class="col-md-6">--}}
{{--                <x-card cardTitle="{{trans('title.config.email.index')}}">--}}

{{--                </x-card>--}}
{{--            </div>--}}
{{--            <div class="col-md-6">--}}
{{--                <x-card cardTitle="{{trans('title.config.email.index')}}">--}}

{{--                </x-card>--}}
{{--            </div>--}}
{{--            <div class="col-md-6">--}}
{{--                <x-card cardTitle="{{trans('title.config.email.index')}}">--}}

{{--                </x-card>--}}
{{--            </div>--}}
{{--            <div class="col-md-6">--}}
{{--                <x-card cardTitle="{{trans('title.config.email.index')}}">--}}

{{--                </x-card>--}}
{{--            </div>--}}
{{--            <div class="col-md-6">--}}
{{--                <x-card cardTitle="{{trans('title.config.email.index')}}">--}}

{{--                </x-card>--}}
{{--            </div>--}}
{{--            <div class="col-md-6">--}}
{{--                <x-card cardTitle="{{trans('title.config.email.index')}}">--}}

{{--                </x-card>--}}
{{--            </div>--}}
{{--            <div class="col-md-6">--}}
{{--                <x-card cardTitle="{{trans('title.config.email.index')}}">--}}

{{--                </x-card>--}}
{{--            </div>--}}
{{--            <div class="col-md-6">--}}
{{--                <x-card cardTitle="{{trans('title.config.email.index')}}">--}}

{{--                </x-card>--}}
{{--            </div>--}}
        </div>

    </x-card>

@endsection


@push('scripts')
    <script>
        // PASSWORD
        const password = document.getElementById('password');
        const togglePassword = document.getElementById('toggle-password');
        togglePassword.addEventListener('click', function () {
            if (password.type === 'password') {
                password.type = 'text';
                togglePassword.classList.remove('<i class="bi bi-eye"></i>');
                togglePassword.classList.add('<i class="bi-eye-slash"></i>');
            } else {
                password.type = 'password';
                togglePassword.classList.remove('<i class="bi-eye-slash"></i>');
                togglePassword.classList.add('<i class="bi bi-eye"></i>');
            }
        });

    </script>
@endpush
