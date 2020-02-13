<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'title',
        'accepted',
    ];

    protected $hidden = [];

    /**
     * Set to 0 if empty
     * @param $input
     */
    public function setAcceptedAttribute($input)
    {
        $this->attributes['accepted'] = $input ? $input : 0;
    }
}
