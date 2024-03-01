<div class="mb-3">
    <x-label for="role name" star="true"/>
    <x-input name="name" required :value="$role->name" />
    <x-error field="name" />
</div>

<div class="mb-3">
    <x-label for="role descriptions" />
    <x-textarea name="descriptions" class="form-control" >{{$role->descriptions}}</x-textarea>
    <x-error field="descriptions" />
</div>

<div class="mb-3 row">
    <div class="col-md-12 mb-3">
        <x-label for="select permissions for this role" />
    </div>
    <x-permission />
    <x-error field="permissions" />
</div>

<div class="row">
    <div class="col-md-6">
        <x-nav-link href="{{route('admin.roles.index')}}" label="Return" class="btn btn-warning"/>
    </div>
    <div class="col-md-6 text-end">
        <x-button class="btn btn-primary" label="{{$buttonText ?? 'Submit' }}" />
    </div>
</div>
