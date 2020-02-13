<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use App\Helpers\CurrencyHelper;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'title',
        'description',
        'price',
        'currency_id',
        'category_id',
        'user_id'
    ];

    protected $appends = [
        'current_price',
    ];

    /**
     * Returns attribute 'carrent_price'
     * @return string
     */
    public function getCurrentPriceAttribute()
    {
        $currency = Cache::has('currency') ? Cache::get('currency') : CurrencyHelper::getCurrency();

        $current_price = price;

        if ($this->currency->name !== 'UAH' && isset($currency[$this->currency->name])){

            $current_price = $this->price * $currency[$this->currency->name];
        }

        return $current_price;
    }

    public function owner()
    {
        $this->belongsTo(User::class, 'user_id');
    }

    public function currency()
    {
        $this->belongsTo(Currency::class, 'currency_id');
    }

    public function category()
    {
        $this->belongsTo(Category::class, 'category_id');
    }

}
