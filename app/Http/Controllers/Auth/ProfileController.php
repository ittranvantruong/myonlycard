<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ProfileRequest;
use App\Models\User;
use App\Services\UploadImageService;

class ProfileController extends Controller
{
    //
    public $model;
    public $service;
    public function __construct(UploadImageService $service)
    {
        parent::__construct();
        $this->model = new User;
        $this->service = $service;
    }
    public function getView()
    {
        return [
            'edit' => 'auth.profile.edit',
            'show' => 'auth.profile.block-right',
        ];        
    }

    public function show(){
        $auth = $this->model->getAuth();
        
        return view($this->view['show'], compact('auth'))->render();
    }

    public function edit(){
        $auth = $this->model->getAuth();
        return view($this->view['edit'], compact('auth'));
    }

    public function update(ProfileRequest $request){
        $data = $request->validated();
        $auth = auth()->user();
        $data['avatar'] = $auth->avatar;
        $data['publish'] = $data['publish'] ?? false;
        if ($request->hasFile('avatar')) {
            $data['avatar'] = $this->service->uploadAvatar($request->file('avatar'))->deleleFile($auth->avatar)->getInstance();
        }
        $auth->update($data);
        return back()->with('success', __('Cập nhật thành công.'));
    }
}
