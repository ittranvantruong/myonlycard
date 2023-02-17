<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;

class UserRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'code_card' => ['required', 'unique:App\Models\User,code_card']
        ];
    }

    public function messages()
    {
        return [
            'code_card.unique' => 'Mã này đã tồn tại trong hệ thống'
        ];
    }
}
