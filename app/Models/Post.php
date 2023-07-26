<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->hasOne(Category::class);
    }

    public function loves()
    {
        return $this->hasMany(PostsLove::class);
    }

    public function lovedBy(?User $user)
    {
        if ($user) {
            return $this->loves->contains('user_id', $user->id);
        }

        return false;
    }
}
