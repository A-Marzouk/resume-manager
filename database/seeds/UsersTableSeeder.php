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
                'email' => 'admin@workforce.com',
                'password' => bcypt('administrator'),
                'is_active' => true,
                'username' => 'admin',
                'referral_code' => 'Z52znBqniabDbD5aSVD4F8jO9',
                'status' => 1,
                'reviewed_at' => now(),
                'stage' => 1,
                'agreed_with_privacy_agreement_at' => true,
                'agreed_with_service_agreement_at' => true,
            ],
        ])->each(function ($item) {
            User::create($item)->assignRole('admin');
        });
    }
}
