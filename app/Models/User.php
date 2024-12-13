<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

date_default_timezone_set("Asia/Makassar");

class User extends Authenticatable
{
    protected $table = 'tb_employee';

    protected $fillable = [
        'full_name',
        'nik',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = md5($value);
    }

    public function getAuthIdentifierName()
    {
        return 'nik';
    }
}
