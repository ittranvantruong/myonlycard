<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;
use App\Rules\CodeCard;

class SignupRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'email' => ['required', 'email', 'unique:App\Models\User,email'],
            'fullname' => ['required'],
            'code_card' => ['required', new CodeCard],
            'password' => ['required', 'string']
        ];
    }
}
