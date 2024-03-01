@extends('layouts.admin')
@section('title','Update Email Configuration')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-card cardTitle="Update Email Configuration">
                <!-- Start form -->
                <x-form action="{{route('admin.configs.email.update')}}">

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <x-label for="mail driver" star="true"/>
                            <x-input name="mail_driver" required :value="env('MAIL_MAILER')"/>
                            <x-error field="mail_driver"/>
                        </div>
                        <div class="col-md-6">
                            <x-label for="mail host" star="true"/>
                            <x-input name="mail_host" required :value="env('MAIL_HOST')"/>
                            <x-error field="mail_host"/>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <x-label for="mail port" star="true"/>
                            <x-input type="number" name="mail_port" required :value="env('MAIL_PORT')"/>
                            <x-error field="mail_port"/>
                        </div>
                        <div class="col-md-6">
                            <x-label for="mail username" star="true"/>
                            <x-input name="mail_username" required :value="env('MAIL_USERNAME')"/>
                            <x-error field="mail_username"/>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <x-label for="mail password" star="true"/>
                            <x-password name="mail_password" required :value="env('MAIL_PASSWORD')"/>
                            <x-error field="mail_password"/>
                        </div>
                        <div class="col-md-6">
                            <x-label for="mail encryption"/>
                            <x-input name="mail_encryption" :value="env('MAIL_ENCRYPTION')" required/>
                            <x-error field="mail_encryption"/>
                        </div>
                    </div>

                    <div class="mb-3">
                        <x-label for="mail address From" star="true"/>
                        <x-email  name="mail_address" :value="env('MAIL_FROM_ADDRESS')" required />
                        <x-error field="mail_address"/>
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
