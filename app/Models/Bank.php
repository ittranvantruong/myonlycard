<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $table = 'banks';

    protected $guarded = [];

    public static function getAll(){
        return static::orderBy('position', 'ASC')->get();
    }
}
