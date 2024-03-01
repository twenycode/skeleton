<?php

namespace App\Http\Controllers\Admin\Location;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Location\CountryCreateRequest;
use App\Http\Requests\Location\CountryUpdateRequest;
use App\Models\Country;
use Illuminate\Support\Facades\DB;

class CountryController extends BaseController
{

    protected $index_view = 'admin.location.countries.index';
    protected $create_view = 'admin.location.countries.create';
    protected $edit_view =  'admin.location.countries.edit';
    protected $resource = 'country';
    protected $resources = 'countries';
    protected $route = 'admin.countries.index';

    public function __construct(Country $country)
    {
        parent::__construct($country);
    }


    // store new resource
    public function store(CountryCreateRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->model->create($request->validated());
            DB::commit();
            return $this->successRoute($this->route,'Added Successfully');
        }
        catch (\Exception $e) {
            DB::rollBack();
            return $this->errorWithInput($request->validated(),$e->getMessage());
        }
    }


    // update existing resource
    public function update(CountryUpdateRequest $request,$id)
    {
        DB::beginTransaction();
        try {
            $country = $this->model->find($this->decode($id));
            $country->update($request->validated());
            DB::commit();
            return $this->successRoute($this->route,'Updated Successfully');
        }
        catch (\Exception $e) {
            DB::rollBack();
            return $this->errorWithInput($request->validated(),$e->getMessage());
        }
    }












}
