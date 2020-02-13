<?php

use Illuminate\Database\Seeder;

class OauthPersonalAccessClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('oauth_personal_access_clients')->delete();

        \DB::table('oauth_personal_access_clients')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'client_id' => 1,
                    'created_at' => '2020-02-12 18:52:27',
                    'updated_at' => '2020-02-12 18:52:27',
                ),
        ));
    }
}
