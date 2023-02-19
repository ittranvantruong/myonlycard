<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Enums\UserRole;
use App\Enums\UserStatus;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code_card',
        'slug',
        'fullname',
        'email',
        'avatar',
        'description',
        'status',
        'roles',
        'publish',
        'password',
        'token_get_password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'roles' => UserRole::class,
        'status' => UserStatus::class
    ];

    public function getAuth(){
        return auth()->user()->load(['links' => function($query){
            $query->with('socialNetwork');
            $query->orderBy('position', 'ASC');
        }]);
    }

    public function links(){
        return $this->hasMany(Link::class, 'user_id');
    }
    public function isUserManager(){
        return $this->roles->value == UserRole::UserManager;
    }

    public static function findByCodeCard($codeCard){
        return static::where('code_card', $codeCard)->first();
    }

    public static function findByKey($key, $value){
        return static::where($key, $value)->first();
    }

    public static function share($slug){
        return static::where('slug', $slug)->where('publish', true)->with('links.socialNetwork')->firstOrFail();
    }

}