<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;


class PlanRequest extends BaseRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'plan_type' => 'required|string',
            'plan_name' => 'required|string',
            'building_type' => 'required|string',
            'material_estimation' => 'required',
            'material_type' => 'required',
            'cement_percentage' => 'required|numeric',
            'block_percentage' => 'required|numeric',
            'start_date' => 'required|date|after:now',
            'block_target'  => 'sometimes|string',
            'cement_target'  => 'sometimes|string',
            'deposit'   => 'required|numeric',
            'deposit_frequency'  => 'sometimes|string',
            'country'  => 'sometimes|string',
        ];
    }
}
