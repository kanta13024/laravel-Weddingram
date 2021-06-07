<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFavorite\Traits\Favoriteable;
use Kyslik\ColumnSortable\Sortable;

class Post extends Model
{
    use Favoriteable, Sortable;

    public $sortable = [
        'shooting_time',
        'created_at',
    ];

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
