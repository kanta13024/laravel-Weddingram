<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected function redirectTo($request)
    {
        return route('dashboard.login');
    }

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $cats = [
        'email_verified_at' => 'datetime',
    ];

    public function folders()
    {
        return $this->hasMany('App\Folder');
    }
}
