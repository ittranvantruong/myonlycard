<?php

namespace App\Http\Controllers\Personalize;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personalize\PersonalizeRequest;
use App\Services\UploadImageService;

class PersonalizeController extends Controller
{
    //
    public $service;
    public function __construct(UploadImageService $service)
    {
        parent::__construct();
        $this->service = $service;
    }
    public function update(PersonalizeRequest $request){
        $data = $request->validated();
        $auth = auth()->user()->load('personalize');
        if(!$data['background_image_url'] && $auth->personalize->background_image_url){
            $this->service->deleleFile($auth->personalize->background_image_url);
        }
        if ($request->hasFile('file')) {
            $data['background_image_url'] = $this->service->uploadAvatar($request->file('file'))
            ->getInstance();
            unset($data['file']);
        }
        $auth->personalize->update($data);
        return back()->with('success', __('Cập nhật thành công.'));
    }
}
