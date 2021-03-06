<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;


class UserPhoneRequest extends BaseRequest
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
            'phone' => 'required|min:11|numeric',
        ];
    }
}
