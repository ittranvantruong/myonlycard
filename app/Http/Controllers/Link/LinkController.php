<?php

namespace App\Http\Controllers\Link;

use App\Http\Controllers\Controller;
use App\Http\Requests\Link\LinkRequest;
use App\Models\{SocialNetwork, Link};
use App\Services\UploadImageService;

class LinkController extends Controller
{
    //

    public $model;
    public $modelSocialNetwork;
    public function __construct(UploadImageService $service)
    {
        parent::__construct();
        $this->model = new Link;
        $this->modelSocialNetwork = new SocialNetwork;
        $this->service = $service;
    }

    public function getView()
    {
        return [
            'create' => 'auth.profile.modals.create-link',
            'edit' => 'auth.profile.modals.edit-link',
            'link' => 'links.item-edit'
        ];
    }
    public function create(){
        $socialNetwork = $this->modelSocialNetwork->get();

        return view($this->view['create'], compact('socialNetwork'))->render();
    }
    public function edit($id){
        $socialNetwork = $this->modelSocialNetwork->get();
        $link = $this->model->findOrFail($id);
        
        $this->authorize('view', $link);

        return view($this->view['edit'], compact('link', 'socialNetwork'))->render();
    }
    public function store(LinkRequest $request){
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['position'] = 0;
        if ($request->hasFile('plain_value.icon_url')) {
            $data['plain_value']['icon_url'] = $this->service
            ->uploadAvatar($request->file('plain_value.icon_url'))
            ->getInstance();
        }
        unset($data['type_social_network_id']);
        $link = $this->model->create($data)->load(['socialNetwork']);
        return view($this->view['link'], compact('link'))->render();

    }

    public function update(LinkRequest $request){

        $data = $request->validated();
        
        $link = $this->model->find($data['id']);
        
        $this->authorize('update', $link);

        if ($request->hasFile('plain_value.icon_url')) {
            $data['plain_value']['icon_url'] = $this->service
            ->uploadAvatar($request->file('plain_value.icon_url'))
            ->deleleFile($link->plain_value['icon_url'] ?? '')
            ->getInstance();
        }
        unset($data['type_social_network_id']);
        $link->update($data);
        $link = $link->load(['socialNetwork']);

        return view($this->view['link'], compact('link'))->render();

    }

    public function reorder(LinkRequest $request){
        $id = $request->input('id');

        return $this->model->updateReorder($id);
    }

    public function delete($id){
        $link = $this->model->findOrFail($id);
        $this->authorize('delete', $link);
        return $link->delete();
    }
}
