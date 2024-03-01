<div class="mb-3">
    <x-label for="full name" star="true"/>
    <x-input name="name" required :value="$admin->name" />
    <input name="user_type" value="admin" readonly hidden required>
    <x-error field="name" />
</div>

<div class="mb-3">
    <x-label for="email address" star="true"/>
    <x-email name="email" required :value="$admin->email" />
    <x-error field="email" />
</div>

<div class="mb-3 row">
    <div class="col-md-12 mb-3">
        <x-label for="assign_roles" />
    </div>
    <x-role />
    <x-error field="roles" />
</div>

<div class="row">
    <div class="col-6 col-md-6 col-lg-6">
        <x-nav-link href="{{route('admin.admins.index')}}" label="Return" class="btn btn-warning"/>
    </div>
    <div class=" col-6 col-md-6 col-lg-6 text-end">
        <x-button class="btn btn-danger" label="{{'Submit'}}"/>
    </div>
</div>

