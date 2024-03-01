<?php

namespace App\Http\Requests\System;

use App\Http\Requests\BaseFormRequest;

class DatabaseConfigRequest extends BaseFormRequest
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
            'db_connection' => ['required','string','max:10'],
            'db_host' => ['required','string','max:255'],
            'db_port' => ['required','integer'],
            'db_database' => ['required','string',],
            'db_username' => ['required','string',],
            'db_password' => ['nullable','string'],
            'db_dump_binary' => ['nullable','string'],
        ];
    }
}
