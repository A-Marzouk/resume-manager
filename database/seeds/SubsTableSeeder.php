<?php

use App\Skill;
use App\SkillType;
use App\Subscription;
use Illuminate\Database\Seeder;

class SubsTableSeeder extends Seeder
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
                'hours_per_week' => 60,
                'amount_paid' => 600 ,
                'duration_in_weeks' => 4,
                'original_duration_in_weeks' => 4,
                'hourly_rate' => 10,
                'start_date' => '2019-09-03',
                'end_date'=> '2019-10-03',
                'client_id' => 1,
                'agent_id' => 1,
                'campaign_id' => 1,
            ]
        ])->each(function ($item) {
            Subscription::create($item);
        });
    }
}
