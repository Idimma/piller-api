<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class TripReviewRequest extends BaseRequest
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
            'rating' => 'required|integer',
            'review' => 'required|string',
        ];
    }
}
