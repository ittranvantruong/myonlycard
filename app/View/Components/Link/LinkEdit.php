<?php

namespace App\View\Components\Link;

use Illuminate\View\Component;
use App\Models\Link;

class LinkEdit extends Component
{

    public $link;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Link $link)
    {
        //
        $this->link = $link;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.links.edit.'.\Str::snake($this->link->socialNetwork->type->key));
    }
}