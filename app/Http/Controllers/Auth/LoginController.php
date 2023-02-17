<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Enums\UserRole;
use App\Enums\UserStatus;

class LoginController extends Controller
{
    //
    public function getView()
    {
        return [
            'index' => 'auth.login'
        ];
    }
    public function getRoute()
    {
        return [
            'userCreate' => 'user.create'
        ];
    }
    public function index(){
        // auth()->logout();
        return view($this->view['index']);
    }

    public function login(LoginRequest $request){
        $data = $request->validated();
        $data['status'] = UserStatus::Active;
        
        if(Auth::attempt($data, true)){
            $request->session()->regenerate();
            if(auth()->user()->roles->value == UserRole::UserManager){
                return redirect()->route($this->route['userCreate']);
            }
            return redirect()->intended(route('home'));
        }
        return back()->with('error', __('Tên đăng nhập hoặc mật khẩu không đúng'));
    }
}
