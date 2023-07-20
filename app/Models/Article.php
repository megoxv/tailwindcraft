<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public $guarded = [];

    public function item_seens()
    {
        return $this->hasMany(\App\Models\ItemSeen::class, 'type_id', 'id')->where('type', "ARTICLE");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'article_categories');
    }
}
