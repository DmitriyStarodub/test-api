<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = ['title'];

    protected $hidden = [];

    const ADMIN_ROLE_ID = 1;
    const SIMPLE_ROLE_ID = 2;

    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
