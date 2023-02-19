<?php

namespace App\Http\Controllers\Link;

use App\Http\Controllers\Controller;
use App\Http\Requests\Link\LinkRequest;
use App\Models\{SocialNetwork, Link};

class LinkController extends Controller
{
    //

    public $model;
    public $modelSocialNetwork;
    public function __construct()
    {
        parent::__construct();
        $this->model = new Link;
        $this->modelSocialNetwork = new SocialNetwork;
    }

    public function getView()
    {
        return [
            'create' => 'auth.profile.modals.create-link',
            'edit' => 'auth.profile.modals.edit-link',
            'link' => 'auth.profile.link'
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
        $link = $this->model->create($data)->load(['socialNetwork']);
        return view($this->view['link'], compact('link'))->render();

    }

    public function update(LinkRequest $request){

        $data = $request->validated();
        
        $link = $this->model->find($data['id']);
        
        $this->authorize('update', $link);

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
