<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSocialNetwork extends Model
{
    use HasFactory;

    protected $table = 'user_social_network';

    protected $guarded = [];

    public function socicalNetwork(){
        return $this->belongsTo(SocialNetwork::class, 'social_network_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
