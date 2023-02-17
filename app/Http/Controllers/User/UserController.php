<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Models\User;
use App\Enums\UserRole;
use App\Enums\UserStatus;

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
        
        $data['status'] = UserStatus::Lock;
        $data['roles'] = UserRole::Customer;
        
        $this->model->create($data);
        return back()->with('success', __('Tạo thành công'));
    }

}
