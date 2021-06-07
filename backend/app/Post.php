<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFavorite\Traits\Favoriteable;

class Post extends Model
{
    use Favoriteable;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function weddingalbum()
    {
        return $this->belongsTo('App\WeddingAlbum');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
