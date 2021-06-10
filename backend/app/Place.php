<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function weddingalbums()
    {
        return $this->hasMany('App\WeddingAlbum');
    }
}
