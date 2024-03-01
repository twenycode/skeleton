<?php

namespace App\Http\Controllers\Admin\Location;

use App\Http\Controllers\BaseController;
use App\Models\Address;

class AddressController extends BaseController
{

    // index view
    protected $index_view = 'admin.location.addresses.index' ;

    // define variable to hold single resource
    protected $resource = 'address';

    // define variable to hold collection resources
    protected $resources = 'addresses';

    // Redirect route after particular action
    protected $route = 'admin.addresses.index';

    // define variable to hold model relations
//    protected $model_relation = ['country','city','district','ward','street'];

    public function __construct(Address $address)
    {
        parent::__construct($address);
    }

    // Get list of resources
    public function index()
    {
        $this->canView();
        try {
            ${$this->resources} = $this->model->orderBy('name','asc')->get();
            return view($this->index_view,compact($this->resources));
        }
        catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }












}
