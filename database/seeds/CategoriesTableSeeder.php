<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->delete();

        $items = [
            [
                'title' => 'Phones & Accessories',
                'accepted' => 1
            ],
            [
                'title' => 'Computer, Office, Security',
                'accepted' => 1
            ],
            [
                'title' => 'Toys, Kids & Baby',
                'accepted' => 1
            ],
            [
                'title' => 'Home',
                'accepted' => 1
            ],
            [
                'title' => 'Other',
                'accepted' => 1
            ]
        ];

        foreach($items as $item){
            \App\Models\Category::create($item);
        }
    }
}
