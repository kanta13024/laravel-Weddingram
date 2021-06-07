<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class WeddingAlbum extends Model
{
    public function posts()
    {
        return $this->hasMany('APP\Post');
    }
}
