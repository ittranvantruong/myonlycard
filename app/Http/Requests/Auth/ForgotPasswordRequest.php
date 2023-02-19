<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class ForgotPasswordRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

     protected function methodPost()
     {
         return [
             'email' =>['required', 'exists:App\Models\User,email']
         ];
     }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    protected function methodPut()
    {
        return [
            'password' => ['required', 'string', 'max:255', 'confirmed'],
        ];
    }
}