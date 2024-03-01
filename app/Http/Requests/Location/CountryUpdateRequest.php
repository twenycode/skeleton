<?php

namespace App\Http\Requests\Location;

use App\Http\Requests\BaseFormRequest;

class CountryUpdateRequest extends BaseFormRequest
{
    //Determine if the user is authorized to make this request.
    public function authorize()
    {
        return $this->checkPermission('country_update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','string','max:50','unique:countries,id,'.$this->id],
            'iso' => ['nullable','string','max:3','unique:countries,id,'.$this->id],
            'currency_code' => ['nullable','string','max:4','unique:countries,id,'.$this->id],
            'phone_code' => ['nullable','string','max:6','unique:countries,id,'.$this->id],
            'postcode' => ['nullable','integer'],
            'latitude' => ['nullable','numeric','between:-90,90'],
            'longitude' => ['nullable','numeric','between:-90,90'],
        ];
    }
}
