<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Exception;

class BaseController extends Controller
{
    protected $model;   // Declare for model
    protected $policy = true;   // Check if the policy can be used or note
    protected $index_view;  // Variable to blade index file location
    protected $create_view; // Variable to blade create file location
    protected $edit_view;   // Variable to blade edit file location
    protected $show_view;   // Variable to blade show file location
    protected $resource;    // Get a single resource from the database
    protected $resources;   // Get a collection of resource from the database
    protected $route;   // Route to redirect after particular action
    protected $model_relation = array();    // Define model all model relationship with other models

    // Class Constructor
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    //  Index class
    public function index()
    {
        $this->canView();
        try {
            ${$this->resources} = $this->model->orderBy('created_at','desc')->get();
            return view($this->index_view,compact($this->resources));
        }
        catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    // Get create form
    public function create()
    {
        $this->canCreate();
        try {
            ${$this->resource} = $this->model;
            return view($this->create_view,compact($this->resource));
        }
        catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    // Saving a new resource into a database
    public function saving($request, $msg = 'Successful added' )
    {
        $this->canCreate();
        try {
            $this->model->create($request);
            if(is_null($this->route)){
                return $this->success($msg);
            }
            return $this->successRoute($this->route,$msg);
        }
        catch (Exception $e) {
            return $this->errorWithInput($request,$e->getMessage());
        }
    }

    // Show record details
    public function show($id)
    {
        $this->canView(); //check user permission

        try {
            ${$this->resource} = $this->model->find($this->decode($id));
            return view($this->show_view,compact($this->resource));
        }
        catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $this->canUpdate();
        try {
            ${$this->resource} = $this->model->find($this->decode($id));
            return view($this->edit_view,compact($this->resource));
        }
        catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    //  Update the specified resource in storage.
    public function updating($request, $id,$msg = 'Updated Successfully' )
    {
        $this->canUpdate();
        try {
            $this->model->find($this->decode($id))->update($request);
            return $this->successRoute($this->route,$msg);
        }
        catch (Exception $e) {
            return $this->errorWithInput($request,$e->getMessage());
        }
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $this->canDelete();
        try {
            $object = $this->model->find($this->decode($id));
            $object->delete();
            return $this->success('Successful deleted');
        }
        catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    /* USER AUTHORIZATION */
    //  If user can read resources
    protected function canView()
    {
        if($this->policy) {
            return $this->authorize('view', $this->model);
        }
    }

    // If user can create a resource
    protected function canCreate()
    {
        if($this->policy) {
            return $this->authorize('create', $this->model);
        }
    }

    //  If user can update resource
    protected function canUpdate()
    {
        if($this->policy) {
            return $this->authorize('update', $this->model);
        }
    }

    //  If user can delete a resource
    protected function canDelete()
    {
        if($this->policy) {
            return $this->authorize('delete', $this->model);
        }
    }

    /*----------------------
    * OTHER FUNCTIONS
    *----------------------*/

    // Decode the primary key
    protected function decode($id)
    {
        return $this->model->decode($id);
    }

    // Display model with its relation models
    public function relationshipModel($column = 'created_at', $sort = 'desc')
    {
        $this->canView();
        try {
            ${$this->resources} = $this->model
                ->with($this->model_relation)
                ->orderBy($column,$sort)
                ->get();
            return view($this->index_view,compact($this->resources));
        }
        catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }


}
