<?php

use Illuminate\Database\Seeder;

class OauthClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('oauth_clients')->delete();

        \DB::table('oauth_clients')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'user_id' => NULL,
                    'name' => 'Laravel Personal Access Client',
                    'secret' => 'l111eakedaLjqd94CCQq7MBSMcYG0UOOOE9TNIAp',
                    'redirect' => 'http://localhost',
                    'personal_access_client' => 1,
                    'password_client' => 0,
                    'revoked' => 0,
                    'created_at' => '2020-02-12 18:52:27',
                    'updated_at' => '2020-02-12 18:52:27',
                ),
            1 =>
                array (
                    'id' => 2,
                    'user_id' => NULL,
                    'name' => 'Laravel Password Grant Client',
                    'secret' => 'cYvHNHkQobTecx4QRrFRXLu7Ydiy1Jm4ZA4nLvpC',
                    'redirect' => 'http://localhost',
                    'personal_access_client' => 0,
                    'password_client' => 1,
                    'revoked' => 0,
                    'created_at' => '2020-02-12 18:52:27',
                    'updated_at' => '2020-02-12 18:52:27',
                ),
        ));
    }
}
