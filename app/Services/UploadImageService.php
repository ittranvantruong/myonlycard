<?php
namespace App\Services;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadImageService
{
    private $disk = 'uploads';
    
    private $pathPrefix = 'public/uploads/users/';

    private $instance;

    private $status;

    public function uploadAvatar($file){
        $path = $file->storeAs('/', $file->hashName(),$this->disk);
        $this->instance = $this->pathPrefix.$path;
        return $this;
    }

    public function deleleFile($pathFile){
        if($pathFile != null && $pathFile != '' ){
            Storage::disk($this->disk)->delete(Str::after($pathFile, $this->pathPrefix));
        }
        return $this;
    }

    public function getInstance(){
        return $this->instance;
    }

    public function getStatus(){
        return $this->status;
    }
}