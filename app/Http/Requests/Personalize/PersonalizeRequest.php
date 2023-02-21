<?php

namespace App\Http\Requests\Personalize;

use App\Http\Requests\Request;

class PersonalizeRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPut()
    {
        return [
            'background_color' => ['required', 'string'],
            'name_color' => ['required', 'string'],
            'file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'background_image_url' => ['nullable', 'string']
        ];
    }
}
