<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPassword;

class ForgotPasswordController extends Controller
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
            'index' => 'auth.password.forgot',
            'edit' => 'auth.password.get',
        ];
    }
    public function index(){
        return view($this->view['index']);
    }
    public function check(ForgotPasswordRequest $request){

        $user  = $this->model->findByKey('email', $request->input('email'));
        $token = (string) Str::uuid() .'-'.time();
        $user->update([
            'token_get_password' => $token
        ]);
        $url = URL::temporarySignedRoute(
            'password.forgot.edit', now()->addMinutes(30), ['token' => $token]
        );

        Mail::to($user)->send(new ForgotPassword($user, $url));

        return back()->with('warning', __('Vui lòng kiểm tra email của bạn để lấy lại mật khẩu.'));
    }
    public function edit(Request $request){
        $user = User::findByKey('token_get_password', $request->token);
        if($user){
            return view($this->view['edit'], ['token' => $user->token_get_password]);
        }
        return abort(403);
    }

    public function update(ForgotPasswordRequest $request){
        $user = $this->model->findByKey('token_get_password', $request->input('token'));
        if($user){
            $user->update([
                'password' => bcrypt($request->input('password'))
            ]);
            return redirect()->route('login')->with('success', __('Thực hiện thành công'));
        }
        return abort(403);
    }
}
