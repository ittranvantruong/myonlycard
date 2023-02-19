<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignupRequest;
use App\Enums\{UserRole, UserStatus };
use App\Models\User;
class SignupController extends Controller
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
            'index' => 'auth.signup'
        ];
    }
    public function index(){
        return view($this->view['index']);
    }
    public function signup(SignupRequest $request){
        $data = $request->validated();

        $user = $this->model->findByCodeCard($data['code_card']);
        $data['status'] = UserStatus::Active;
        $data['password'] = bcrypt($data['password']);
        $user->update($data);
        return redirect()->route('login')->with('success', __('Bạn đã đăng ký thành công'));
    }

}
