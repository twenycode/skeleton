<?php

namespace App\Http\Requests\Auth;

use App\Rules\OldPasswordCheck;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ChangePasswordRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {

        return [
            'current_password' => ['required',new OldPasswordCheck],
            'password' => ['required','confirmed',Password::min(8)->mixedCase()->symbols()->numbers()],
        ];

    }
}
