<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    //
    public function getView()
    {
        return [
            'index' => 'auth.signup'
        ];
    }
    public function index(){
        return view($this->view['index']);
    }

}
