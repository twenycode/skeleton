<div class="mb-3">
    <x-label for="Permission name" star="true"/>
    <x-input name="name" required :value="$permission->name" />
    <x-error field="name" />
</div>
<div class="mb-3">
    <x-label for="descriptions" />
    <x-textarea name="descriptions" class="form-control" >{{$permission->descriptions}}</x-textarea>
    <x-error field="descriptions" />
</div>
<div class="mb-3 row">
    <div class="col-md-12 mb-3">
        <x-label for="assign_roles to permission" />
    </div>
    <x-role />
    <x-error field="roles" />
</div>
<div class="row">
    <div class="col-md-6">
        <x-nav-link href="{{route('admin.permissions.index')}}" label="Return" class="btn btn-warning"/>
    </div>
    <div class="col-md-6 text-end">
        <x-button class="btn btn-primary" label="{{ $buttonText ?? 'Submit' }}" />
    </div>
</div>
