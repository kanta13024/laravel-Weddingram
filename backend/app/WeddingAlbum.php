<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class WeddingAlbum extends Model
{
    use Sortable;

    public $sortable = [
        'name',
        'event_date',
        'place',
        'created_at'
    ];

    public function posts()
    {
        return $this->hasMany('APP\Post');
    }

    public function place()
    {
        return $this->belongsTo('App\Place');
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
