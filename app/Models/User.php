<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Crypt;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasRoles, HasApiTokens, HasFactory, HasProfilePhoto, Notifiable, TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
        'provider_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function getProfilePhoto()
    {
        if ($this->profile_photo == null) {
            return $this->profile_photo_url;
        } elseif($this->provider != 'default'){
            return $this->profile_photo;
        } else {
            return env("APP_URL") . '/' . 'storage/' . $this->profile_photo;
        }
    }

    public function setProviderTokenAttribute($value)
    {
        $this->attributes['provider_token'] = Crypt::encrypt($value);
    }

    public function getProviderTokenAttribute($value)
    {
        $this->provider_token;
        return Crypt::decrypt($value);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function totalLoves()
    {
        return $this->posts->flatMap(function ($post) {
            return $post->loves;
        })->count();
    }
}
