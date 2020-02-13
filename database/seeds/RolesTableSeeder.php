<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->delete();

        $items = [

            ['id' => 1, 'title' => 'Administrator',],
            ['id' => 2, 'title' => 'Simple',],

        ];

        foreach ($items as $item) {
            \App\Models\Role::create($item);
        }
    }
}
