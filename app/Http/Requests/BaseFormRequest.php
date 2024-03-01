<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseFormRequest extends FormRequest
{

    protected function checkPermission($permission)
    {
        if(auth()->user()->can($permission) || auth()->user()->hasRole('superAdmin')){
            return true;
        }
        abort(403);
    }

}
