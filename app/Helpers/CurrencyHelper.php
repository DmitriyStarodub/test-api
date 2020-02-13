<?php

namespace App\Helpers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class CurrencyHelper
{
    public static function getCurrency()
    {
        $guzzleHttpClient = new Client();
        $key = env('OPENEXCHANGERATES_API_KEY');

        $result = $guzzleHttpClient->get('https://openexchangerates.org/api/latest.json?app_id=' . $key);

        $currency = [];
        if ($result->getStatusCode() == 200) {
            $result = (array)(json_decode($result->getBody()))->rates;

            $currency['UAH'] = 1;
            $currency['USD'] = $result['UAH'];
            $neededCurrencies = ['EUR', 'GBP', 'JPY', 'PLN'];
            foreach ($neededCurrencies as $neededCurrency) {
                $currency[$neededCurrency] = $currency['USD'] / $result[$neededCurrency];
            }

            Cache::put('currency', $currency, 1700);

        } else {
            echo 'Cant get currency rates. Status code ' . $result->getStatusCode() . PHP_EOL;
        }

        return $currency;
    }
}