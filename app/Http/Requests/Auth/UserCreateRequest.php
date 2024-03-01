<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseFormRequest;


class UserCreateRequest extends BaseFormRequest
{
    //Determine if the user is authorized to make this request.
    public function authorize()
    {
        return $this->checkPermission('user_create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required','email','max:70','unique:users'],
            'user_type' => ['required','string'],
        ];
    }
}
