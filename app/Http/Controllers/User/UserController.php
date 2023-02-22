<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Models\User;
use App\Enums\{UserRole, UserStatus };

class UserController extends Controller
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
            'create' => 'user.create'
        ];
    }
    public function create(){
        return view($this->view['create']);
    }

    public function store(UserRequest $request){
        $data = $request->validated();
        
        $data['slug'] = time();
        $data['status'] = UserStatus::Lock;
        $data['roles'] = UserRole::Customer;
        $data['password'] = bcrypt($data['password']);

        $this->model->create($data)->personalize()->create();

        return back()->with('success', __('Tạo thành công'));
    }

}
