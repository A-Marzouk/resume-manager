<?php

use App\SkillType;
use Illuminate\Database\Seeder;

class SkillTypesTableSeeder extends Seeder
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
                'name' => 'programming',
                'label' => 'Programming',
            ],
            [
                'name' => 'design',
                'label' => 'Design',
            ],
            [
                'name' => 'software',
                'label' => 'Software',
            ],
            [
                'name' => 'frameworks',
                'label' => 'Frameworks',
            ],
        ])->each(function ($item) {
            SkillType::create($item);
        });
    }
}
