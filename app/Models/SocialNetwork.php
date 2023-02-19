<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\SocialNetWorkType;

class SocialNetwork extends Model
{
    use HasFactory;

    protected $table = 'social_network';

    protected $guarded = [];

    protected $casts = [
        'type' => SocialNetWorkType::class
    ];
}
