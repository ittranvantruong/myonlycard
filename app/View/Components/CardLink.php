<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Enums\SocialNetWorkType;

class CardLink extends Component
{

    public $type;
    
    public $link;

    public $logo;

    public $name;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(SocialNetWorkType $type, $link = '#', $name = '', $logo = '')
    {
        //
        $this->type = $type;
        $this->link = $link;
        $this->name = $name;
        $this->logo = $logo;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-link');
    }

    public function handleLink(){
        if($this->type->value == SocialNetWorkType::BrowerLink){
            return $this->link;
        }elseif($this->type->value == SocialNetWorkType::Phone){
            return 'tel:'.$this->link;
        }elseif($this->type->value == SocialNetWorkType::Email){
            return 'mailto:'.$this->link;
        }elseif($this->type->value == SocialNetWorkType::Zalo){
            return 'https://zalo.me/'.$this->link;
        }
    }
}