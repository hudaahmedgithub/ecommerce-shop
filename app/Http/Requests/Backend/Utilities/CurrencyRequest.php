<?php

namespace App\Http\Requests\Backend\Utilities;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ar'        => 'array',
            'ar.name'   => 'bail|required|string|max:100',
            'en'        => 'array',
            'en.name'   => 'bail|required|string|max:100',
            'active'    => 'in:yes,no'
        ];
    }
}
