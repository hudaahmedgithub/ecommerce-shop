<?php

namespace App\Http\Requests\Backend\Property;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
            'name'          => 'bail|required|string|max:255',
            'status'        => 'bail|required|in:for_rent,for_sale',
            'place_id'      => 'bail|required|exists:places,id',
            'type_id'       => 'bail|required|exists:types,id',
            'address'       => 'bail|required|string|max:255',
            'currency_id'   => 'bail|required|exists:currencies,id',
            'price'         => 'bail|required|integer',
            'payment_way'   => 'bail|required|in:cach,installment',
            'measure_id'    => 'bail|required|exists:measures,id',
            'area'          => 'bail|required|integer',
            'phone'         => 'bail|nullable|regex:/(01)[0-9]{9}/',
            'discription'   => 'bail|nullable|string',
            'services'      => 'bail|nullable|string',
            'attaches'      => 'bail|nullable|string',
            'notes'         => 'bail|nullable|string',
            'video'         => 'bail|nullable',
        ];
    }
}
