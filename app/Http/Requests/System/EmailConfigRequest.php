<?php

namespace App\Http\Requests\System;

use App\Http\Requests\BaseFormRequest;

class EmailConfigRequest extends BaseFormRequest
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
            'mail_driver' => ['required','string','max:10'],
            'mail_host' => ['required','string','max:255'],
            'mail_port' => ['required','integer'],
            'mail_username' => ['required','string',],
            'mail_password' => ['required','string'],
            'mail_encryption' => ['required','string','max:20'],
            'mail_address' => ['nullable','email'],
        ];
    }
}
