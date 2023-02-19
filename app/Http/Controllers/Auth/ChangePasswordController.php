<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Models\User;

class ChangePasswordController extends Controller
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
            'index' => 'auth.password.change'
        ];
    }
    public function index(){
        return view($this->view['index']);
    }

    public function update(ChangePasswordRequest $request){
        auth()->user()->update([
            'password' => bcrypt($request->input('password'))
        ]);
        return back()->with('success', __('Thực hiện thành công'));
    }
}
