<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'name' => 'Admin',
            'password' => '$2y$10$VArwYpJa7Lhc1oDqtz7yq.LpIsdRduMAj.0mXzGnDTaSc7RAIaLv.',  //(NqHLfsQkieL483!)
            'email_verified_at' => NULL,
            'role_id' => \App\Models\Role::ADMIN_ROLE_ID,
            'remember_token' => NULL,
        ];

        \App\Models\User::updateOrCreate(['email' => 'test.api@admin.com'],$admin);
    }
}
