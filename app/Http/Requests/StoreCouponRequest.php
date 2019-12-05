<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCouponRequest extends FormRequest
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
            'type' => 'bail|required|in:percentage,flat_rate',
            'code' => 'bail|required|string|unique:coupons,code',
            'amount' => 'bail|required|string|max:20',
            'duration' => 'bail|required|in:once,multi_times',
            'multi_times_count' => 'min:1',
            'expires_at' => 'required|date'
        ];
    }
}
