@extends('layouts.admin')
@section('title','New Public User')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <x-card cardTitle="New Public User">

                <!-- Start form -->
                <x-form action="{{route('admin.users.store')}}">
                    <div class="mb-3">
                        <x-label for="full name" star="true"/>
                        <x-input name="name" required :value="$user->name" />
                        <input name="user_type" value="public" readonly hidden required>
                        <x-error field="name" />
                    </div>

                    <div class="mb-3">
                        <x-label for="email address" star="true"/>
                        <x-email name="email" required :value="$user->email" />
                        <x-error field="email" />
                    </div>

                    <div class="row">
                        <div class="col-6 col-md-6 col-lg-6">
                            <x-nav-link href="{{route('admin.users.index')}}" label="Return" class="btn btn-warning"/>
                        </div>
                        <div class=" col-6 col-md-6 col-lg-6 text-end">
                            <x-button class="btn btn-danger" label="{{'Submit'}}"/>
                        </div>
                    </div>

                </x-form>
            </x-card>
        </div>
    </div>


@endsection
