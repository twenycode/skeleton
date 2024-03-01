@extends('layouts.admin')
@section('title','Application Configuration')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <x-card cardTitle="Application Configuration">
                <!-- Start form -->
                <x-form action="{{route('admin.configs.app.update')}}">

                    <div class="mb-3">
                        <x-label for="APP Name" star="true"/>
                        <x-input name="app_name" required :value="env('APP_NAME')"/>
                        <x-error field="app_name"/>
                    </div>

                    <div class="mb-3">
                        <x-label for="APP Environment" star="true"/>
                        <select name="app_env" class="form-select" required>
                            <option value="local" {{old('app_env',env('APP_ENV')) == 'local' ? 'selected' : ''}} >
                                Local
                            </option>
                            <option value="production" {{old('app_env',env('APP_ENV')) == 'production' ? 'selected' : ''}} >
                                Production
                            </option>
                        </select>
                        <x-error field="app_env"/>
                    </div>

                    <div class="mb-3">
                        <x-label for="APP Debug" star="true"/>
                        <select name="app_debug" class="form-select" required>
                            <option value="true" {{old('app_debug',env('APP_DEBUG')) == 1 ? 'selected' : ''}} > True
                            </option>
                            <option value="false" {{old('app_debug',env('APP_DEBUG')) == 0 ? 'selected' : ''}} > False
                            </option>
                        </select>
                        <x-error field="app_debug"/>
                    </div>

                    <div class="mb-3">
                        <x-label for="APP URL" star="true"/>
                        <x-input type="url" name="app_url" required :value="env('APP_URL')"/>
                        <x-error field="app_url"/>
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
