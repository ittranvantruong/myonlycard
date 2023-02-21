<?php

namespace App\Http\Controllers\Link;

use App\Http\Controllers\Controller;
use App\Models\SocialNetwork;
use Illuminate\Http\Request;

class RenderInputController extends Controller
{
    //
    public $modelSocialNetwork;
    public function __construct()
    {
        parent::__construct();
        $this->modelSocialNetwork = new SocialNetwork;
    }
    public function getView()
    {
        return [
            'input' => 'links.form.'
        ];
    }
    public function show($social_network_id = null){
        $socialNetwork = $this->modelSocialNetwork->findOrFail($social_network_id);
        return view($this->view['input'].\Str::snake($socialNetwork->type->key), compact('socialNetwork'))->render();
    }

}
