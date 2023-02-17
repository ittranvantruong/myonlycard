<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class HomeController extends Controller
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
            'index' => 'home.index'
        ];
    }
    public function index(){
        $auth = $this->model->getAuth();
        return view($this->view['index'], compact('auth'));
    }
}
