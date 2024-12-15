<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable
{
    protected $table = 'tb_employee';

    protected $fillable = [
        'full_name',
        'nik',
        'password',
        'level_id',
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

    public function level()
    {
        return $this->belongsTo(LevelModel::class, 'level_id');
    }
}
