<?php

namespace App\Http\Requests\Link;

use App\Enums\SocialNetWorkType;
use App\Http\Requests\Request;
use BenSampo\Enum\Rules\EnumValue;

class LinkRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        $this->validate['social_network_id'] = ['required', 'exists:App\Models\SocialNetwork,id'];
        $this->validate['type_social_network_id'] = ['required', new EnumValue(SocialNetWorkType::class, false)];
        $this->validate['plain_value.background_color'] = ['required', 'string'];
        $this->validate['plain_value.text_color'] = ['required', 'string'];

        if($this->input('type_social_network_id') == SocialNetWorkType::Simple){
            $this->validate['plain_value.value_any'] = ['required'];
        }elseif($this->input('type_social_network_id') == SocialNetWorkType::Text){
            $this->validate['plain_value.title'] = ['required', 'string'];
            $this->validate['plain_value.content'] = ['required'];
        }elseif($this->input('type_social_network_id') == SocialNetWorkType::Custom){
            $this->validate['plain_value.title'] = ['required', 'string'];
            $this->validate['plain_value.url'] = ['required', 'url'];
            $this->validate['plain_value.icon_url'] = ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'];
        }elseif($this->input('type_social_network_id') == SocialNetWorkType::AccountBank){
            $this->validate['plain_value.bank_id'] = ['required', 'exists:App\Models\Bank,id'];
            $this->validate['plain_value.account_name'] = ['required', 'string'];
            $this->validate['plain_value.account_number'] = ['required', 'string'];
        }
        
        return $this->validate;
    }
    protected function methodPut()
    {
        if($this->routeIs('link.reorder')){
            $this->validate['id.*'] = ['required', 'exists:App\Models\Link,id'];
        }else{
            $this->validate['id'] = ['required', 'exists:App\Models\Link,id'];
            $this->validate['social_network_id'] = ['required', 'exists:App\Models\SocialNetwork,id'];
            $this->validate['type_social_network_id'] = ['required', new EnumValue(SocialNetWorkType::class, false)];
            $this->validate['plain_value.background_color'] = ['required', 'string'];
            $this->validate['plain_value.text_color'] = ['required', 'string'];

            if($this->input('type_social_network_id') == SocialNetWorkType::Simple){
                $this->validate['plain_value.value_any'] = ['required'];
            }elseif($this->input('type_social_network_id') == SocialNetWorkType::Text){
                $this->validate['plain_value.title'] = ['required', 'string'];
                $this->validate['plain_value.content'] = ['required'];
            }elseif($this->input('type_social_network_id') == SocialNetWorkType::Custom){
                $this->validate['plain_value.title'] = ['required', 'string'];
                $this->validate['plain_value.url'] = ['required', 'url'];
                $this->validate['plain_value.icon_url'] = ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'];
            }elseif($this->input('type_social_network_id') == SocialNetWorkType::AccountBank){
                $this->validate['plain_value.bank_id'] = ['required', 'exists:App\Models\Bank,id'];
                $this->validate['plain_value.account_name'] = ['required', 'string'];
                $this->validate['plain_value.account_number'] = ['required', 'string'];
            }
        }
        return $this->validate;
    }
    public function methodDelete(){
        return [
            'id' => ['required', 'exists:App\Models\Link,id']
        ];
    }
}
