<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class AvatarRequest extends BaseRequest
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
            'profile_image'     =>  'required|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }
}
