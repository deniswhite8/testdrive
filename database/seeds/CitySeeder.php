<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;

/**
 * City seeder
 */
class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->delete();
        $csv = Reader::createFromPath(__DIR__ . '/data/cities.csv');
        DB::table('cities')->insert($csv->fetchAssoc());
    }
}
