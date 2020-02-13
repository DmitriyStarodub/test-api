<?php

use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('currencies')->delete();

        $items = [
            ['id' => 1, 'name' => 'UAH', 'accepted' => 1, 'icon' => '₴'],
            ['id' => 2, 'name' => 'USD', 'accepted' => 1, 'icon' => '$'],
            ['id' => 3, 'name' => 'EUR', 'accepted' => 1, 'icon' => '€'],
            ['id' => 4, 'name' => 'GBP', 'accepted' => 1, 'icon' => '£'],
            ['id' => 5, 'name' => 'JPY', 'accepted' => 1, 'icon' => '¥'],
            ['id' => 6, 'name' => 'PLN', 'accepted' => 1, 'icon' => 'PLN'],
        ];

        foreach ($items as $item) {
            \App\Models\Currency::create($item);
        }
    }
}
