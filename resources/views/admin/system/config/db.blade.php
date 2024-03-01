@extends('layouts.admin')
@section('title','Database Configurations')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-7">
            <x-card cardTitle="Database Configurations">
                <!-- Start form -->
                <x-form action="{{route('admin.configs.db.update')}}">

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <x-label for="DB Connection" star="true"/>
                            <x-input name="db_connection" required :value="env('DB_CONNECTION')"/>
                            <x-error field="db_connection"/>
                        </div>
                        <div class="col-md-6">
                            <x-label for="DB Host" star="true"/>
                            <x-input name="db_host" required :value="env('DB_HOST')"/>
                            <x-error field="db_host"/>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <x-label for="DB Port" star="true"/>
                            <x-input type="number" name="db_port" required :value="env('DB_PORT')"/>
                            <x-error field="db_port"/>
                        </div>
                        <div class="col-md-6">
                            <x-label for="DB Name" star="true"/>
                            <x-input name="db_database" required :value="env('DB_DATABASE')"/>
                            <x-error field="db_database"/>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <x-label for="DB Username" star="true"/>
                            <x-input name="db_username" required :value="env('DB_USERNAME')"/>
                            <x-error field="db_username"/>
                        </div>
                        <div class="col-md-6">
                            <x-label for="DB Password"/>
                            <x-password name="db_password" :value="env('DB_PASSWORD')"/>
                            <x-error field="db_password"/>
                        </div>
                    </div>

                    <div class="mb-4">
                        <x-label for="Binary Path Dump"/>
                        <x-input name="db_dump_binary" :value="env('DB_DUMP_BINARY_PATH')"/>
                        <x-error field="db_dump_binary"/>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <x-nav-link href="{{route('admin.configs.index')}}" label="Return" class="btn btn-warning"/>
                        </div>
                        <div class="col-md-6 text-end">
                            <x-button class="btn btn-danger" label="Submit"/>
                        </div>
                    </div>

                </x-form>
            </x-card>
        </div>
    </div>

@endsection
