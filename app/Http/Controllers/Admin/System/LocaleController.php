<?php

namespace App\Http\Controllers\Admin\System;

use App\Http\Controllers\BaseController;
use App\Http\Requests\System\LocaleCreateRequest;
use App\Http\Requests\System\LocaleUpdateRequest;
use App\Models\Locale;

class LocaleController extends BaseController
{
    // path to index view
    protected $index_view = 'admin.system.locales.index';

    // path to edit view
    protected $edit_view = 'admin.system.locales.edit';

    // path to create view
    protected $create_view = 'admin.system.locales.create';

    // define variable to hold single object
    protected $resource = 'locale';

    // define variable to hold collection of object
    protected $resources = 'locales';

    // define variable to hold collection of object
    protected $route = 'admin.locales.index';

    //  Controller constructor.
    public function __construct(Locale $model)
    {
        parent::__construct($model);
    }

    // store new resource
    protected function store(LocaleCreateRequest $request)
    {
        return $this->saving($request->validated());
    }

    // update existing resource
    protected function update(LocaleUpdateRequest $request,$id)
    {
        return $this->updating($request->validated(),$id);
    }
}
