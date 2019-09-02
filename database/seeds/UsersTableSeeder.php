<?php

use App\User;
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
        collect([
            [
                'email' => 'admin@123workforce.com',
                'password' => 'administrator',
                'is_active' => true,
                'username' => 'admin',
                'referral_code' => 'Z52znBqniabDbD5aSVD4F8jO9',
                'status' => 1,
                'reviewed_at' => now(),
                'stage' => 1,
                'agreed_with_privacy_agreement_at' => now(),
                'agreed_with_service_agreement_at' => now(),
            ],
        ])->each(function ($item) {
            User::create($item)->assignRole('admin');
        });

        collect([
            [
                'user' => [
                    'email' => 'agent@123workforce.com',
                    'password' => '123456789',
                    'username' => 'agent',
                ],
                'agent' => [],
                'user_data' => [
                    'profession_id' => '1',
                    'first_name' => 'John',
                    'last_name' => 'Doe'
                ],

            ],
        ])->each(function ($item) {
            app(User::class)->createAgent($item);
        });

        collect([
            [
                'user' => [
                    'email' => 'client@123workforce.com',
                    'password' => '123456789',
                    'username' => 'client',
                ],
                'client' => [
                    'contact' => 'John doe'
                ],
            ],
        ])->each(function ($item) {
            app(User::class)->createClient($item);
        });
    }
}
