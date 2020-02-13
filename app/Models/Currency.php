<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currencies';

    protected $fillable = [
        'name',
        'accepted',
        'icon'
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
