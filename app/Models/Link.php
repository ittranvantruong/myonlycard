<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Link extends Model
{
    use HasFactory;

    protected $table = 'links';

    protected $guarded = [];

    protected $casts = [
        'plain_value' => AsArrayObject::class
    ];

    public function socialNetwork(){
        return $this->belongsTo(SocialNetwork::class, 'social_network_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function updateReorder($id){
        $query = 'UPDATE links SET position = CASE id ';
        foreach ($id as $key => $value) {
            $query .= 'WHEN '.$value.' THEN "'.$key.'" ';
        }
        $query .= 'END WHERE id IN (';
        $query .= implode(',', $id);
        $query .= ')';
        return DB::update($query);
    }
}
