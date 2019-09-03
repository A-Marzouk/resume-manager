<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->cleanDatabase();

        $this->call(RolesAndPermissionsTableSeeder::class);
        $this->call(ProfessionsTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(SkillTypesTableSeeder::class);
        $this->call(SkillsTableSeeder::class);
        $this->call(CurrenciesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CampaignsTableSeeder::class);
        $this->call(LogsTableSeeder::class);
        $this->call(CampaignFAQTableSeeder::class);
        $this->call(SubsTableSeeder::class);
    }

    private function cleanDatabase()
    {
        Schema::disableForeignKeyConstraints();

        collect(DB::select("SHOW FULL TABLES WHERE Table_Type = 'BASE TABLE'"))
            ->map(function ($tableProperties) {
                return get_object_vars($tableProperties)[key($tableProperties)];
            })
            ->reject(function (string $tableName) {
                return $tableName === 'migrations';
            })
            ->each(function (string $tableName) {
                DB::table($tableName)->truncate();
            });

        Schema::enableForeignKeyConstraints();
    }
}
