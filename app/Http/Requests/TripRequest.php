<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;


class TripRequest extends BaseRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'address' => 'required|string',
            'lat' => 'required|numeric',
            'lon' => 'required|numeric',
            'coupon'   => 'sometimes|string'
        ];
    }
}
