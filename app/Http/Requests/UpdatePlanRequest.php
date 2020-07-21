<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;


class UpdatePlanRequest extends BaseRequest
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
            'plan_id' => 'required',
//            'lat' => 'required|numeric',
//            'lon' => 'required|numeric',
//            'quantity' => 'required|numeric',
//            'start_date' => 'required|date|after:now',
//            'comment'  => 'sometimes|string',
//            'coupon'   => 'sometimes|string'
        ];
    }
}
