<?php

namespace App\Http\Controllers\Share;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class ShareController extends Controller
{
    //
    public $model;
    public function __construct()
    {
        parent::__construct();
        $this->model = new User;
    }
    public function getView()
    {
        return [
            'show' => 'share.show'
        ];
    }
    public function show($slug){
        $user = $this->model->share($slug);
        return view($this->view['show'], compact('user'));
    }
}
