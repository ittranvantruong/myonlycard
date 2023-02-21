<?php

namespace App\Http\Requests\Link;

use App\Enums\SocialNetWorkType;
use App\Http\Requests\Request;

class LinkRequest extends Request
{
    private $validate = [];
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        $this->validate['social_network_id'] = ['required', 'exists:App\Models\SocialNetwork,id'];
        $this->validate['plain_value'] = ['required'];

        if($this->input('social_network_id') == SocialNetWorkType::Text){
            $this->validate['plain_value.title'] = ['required', 'string'];
            $this->validate['plain_value.content'] = ['required'];
        }elseif($this->input('social_network_id') == SocialNetWorkType::Custom){
            $this->validate['plain_value.title'] = ['required', 'string'];
            $this->validate['plain_value.url'] = ['required', 'url'];
            $this->validate['plain_value.icon_url'] = ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'];
        }elseif($this->input('social_network_id') == SocialNetWorkType::AccountBank){
            $this->validate['plain_value.bank_name'] = ['required', 'string'];
            $this->validate['plain_value.account_name'] = ['required', 'string'];
            $this->validate['plain_value.account_number'] = ['required', 'string'];
        }
        
        return $this->validate;
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
