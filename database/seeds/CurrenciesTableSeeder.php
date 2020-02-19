<?php

use App\Currency;
use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
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
                'name' => "usd",
                'label' => 'USD',
            ],
        ])->each(function ($item) {
            Currency::create($item);
        });
    }
}
