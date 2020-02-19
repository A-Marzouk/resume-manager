<?php

use App\ActivityLog;
use Illuminate\Database\Seeder;

class LogsTableSeeder extends Seeder
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
                'log_text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut',
                'status' => 1,
                'campaign_id' => 1,
                'agent_id' => 1
            ],
            [
                'log_text' => 'Lorem dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut',
                'status' => 2,
                'campaign_id' => 1,
                'agent_id' => 1
            ]

        ])->each(function ($item) {
            ActivityLog::create($item);
        });
    }
}
