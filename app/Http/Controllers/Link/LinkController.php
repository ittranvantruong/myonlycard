<?php

namespace App\Http\Controllers\Link;

use App\Enums\SocialNetWorkType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Link\LinkRequest;
use App\Models\{SocialNetwork, Link, Bank};
use App\Services\UploadImageService;

class LinkController extends Controller
{
    //

    public $model;

    public $modelSocialNetwork;

    public $modelBank;

    private $data;

    public function __construct(UploadImageService $service)
    {
        parent::__construct();
        $this->model = new Link;
        $this->modelSocialNetwork = new SocialNetwork;
        $this->modelBank = new Bank;
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

        $this->data = $request->validated();
        $this->data['user_id'] = auth()->user()->id;
        $this->data['position'] = 0;

        $this->handleSameCreateAndUpdate($request);

        $link = $this->model->create($this->data)->load(['socialNetwork']);
        return view($this->view['link'], compact('link'))->render();

    }

    public function update(LinkRequest $request){

        $this->data = $request->validated();
        
        $link = $this->model->find($this->data['id']);
        
        $this->authorize('update', $link);

        $this->handleSameCreateAndUpdate($request);

        $this->service->deleleFile($link->plain_value['icon_url'] ?? '');

        $link->update($this->data);
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

        $this->service->deleleFile($link->plain_value['icon_url'] ?? '');

        return $link->delete();
    }

    private function handleSameCreateAndUpdate($request){
        if($this->data['type_social_network_id'] == SocialNetWorkType::Custom){
            if ($request->hasFile('plain_value.icon_url')) {

                $this->data['plain_value']['icon_url'] = $this->service
                ->uploadAvatar($request->file('plain_value.icon_url'))
                ->getInstance();

            }
        }elseif($this->data['type_social_network_id'] == SocialNetWorkType::AccountBank){
            $this->handleHasBank();
        }
        $this->handleItemUnnecessary();
    }

    private function handleHasBank(){
        $this->data['plain_value']['bank'] = $this->modelBank->find($this->data['plain_value']['bank_id'])->toArray();
    }

    private function handleItemUnnecessary(){
        unset($this->data['type_social_network_id'], $this->data['plain_value']['bank_id']);
    }

}
