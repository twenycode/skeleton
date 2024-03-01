<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    // Flash error alert message
    protected function alertError($msg = 'Something went Wrong')
    {
        return flash($msg)->error();
    }

    //  Flash success alert message
    protected function alertSuccess($msg = 'Successful created')
    {
        return flash($msg)->success();
    }

    /* Controllers redirects after action */
    // Return error response
    public function error($msg = 'something is wrong')
    {
        $this->alertError($msg);
        return back();
    }

    // Return success response
    public function success($msg)
    {
        $this->alertSuccess($msg);
        return back();
    }

    //  Return error response with form request
    public function errorWithInput($request,$msg = 'Something is Wrong')
    {
        $this->alertError($msg);
        return back()->withInput($request);
    }

    //  Return error response with form request
    public function successWithInput($request,$msg = 'Successful created')
    {
        $this->alertSuccess();
        return redirect()->back()->withInput($request);
    }

    //  Return error response when there is duplicate
    public function duplicateError($msg)
    {
        $this->alertError($msg);
        return back()->withErrors($msg);
    }

    //  Return success with route
    public function successRoute($route,$msg)
    {
        $this->alertSuccess($msg);
        return redirect()->route($route);
    }












}
