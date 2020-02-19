<?php

use App\Profession;
use Illuminate\Database\Seeder;

class ProfessionsTableSeeder extends Seeder
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
                'name' => 'business-support',
                'label' => 'businessSupport',
            ],
            [
                'name' => 'developer',
                'label' => 'Developer',
            ],
            [
                'name' => 'designer',
                'label' => 'Designer',
            ],
        ])->each(function ($item) {
            Profession::create($item);
        });
    }
}
