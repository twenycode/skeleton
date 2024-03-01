<?php

namespace App\Http\Requests\System;

use App\Http\Requests\BaseFormRequest;

class ApplicationConfigRequest extends BaseFormRequest
{
    //Determine if the user is authorized to make this request.

    public function authorize()
    {
        return $this->checkPermission('config_create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'app_name' => ['required','string'],
            'app_env' => ['required','string','max:12'],
            'app_debug' => ['required','string'],
            'app_url' => ['required','url'],
        ];
    }
}
