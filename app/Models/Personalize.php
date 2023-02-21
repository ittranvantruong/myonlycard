<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personalize extends Model
{
    use HasFactory;

    protected $table = 'personalize';

    protected $guarded = [];

    protected $casts = [
        'plain_text' => AsArrayObject::class
    ];
}
