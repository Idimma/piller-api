<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;


class UserRegistrationRequest extends BaseRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'phone'   => 'required|numeric|unique:users',
            'country' => 'sometimes|string',

        ];
    }

}
