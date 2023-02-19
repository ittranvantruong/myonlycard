<?php

namespace App\Http\Requests\Link;

use App\Http\Requests\Request;

class LinkRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'social_network_id' => ['required', 'exists:App\Models\SocialNetwork,id'],
            'plain_value' => ['required']
        ];
    }
    protected function methodPut()
    {
        if($this->routeIs('link.reorder')){
            return [
                'id.*' => ['required', 'exists:App\Models\Link,id']
            ];
        }
        return [
            'id' => ['required', 'exists:App\Models\Link,id'],
            'social_network_id' => ['required', 'exists:App\Models\SocialNetwork,id'],
            'plain_value' => ['required']
        ];
    }
    public function methodDelete(){
        return [
            'id' => ['required', 'exists:App\Models\Link,id']
        ];
    }
}
