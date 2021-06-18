<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }
}
