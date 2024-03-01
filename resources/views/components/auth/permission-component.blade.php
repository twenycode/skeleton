@foreach ($permissions as $category=>$perms)
    <div class="col-sm-6 col-md-2 col-lg-2 mb-3">
        <h5 class="font-weight-bold p-1 bg-secondary-light ">{{$category}}</h5>
        <ul class="permission-list">
            @foreach ($perms as $permission)
                <li>
                    <label class="label">
                        {{ Form::checkbox('permissions[]',$permission->id) }}
                        {{$permission->action}}
                        <span class="checkmark"></span>
                    </label>
                </li>
            @endforeach
        </ul>
    </div>
@endforeach
