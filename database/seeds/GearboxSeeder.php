<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;

/**
 * Gearbox type seeder
 */
class GearboxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('auto_gearboxes')->delete();
        $csv = Reader::createFromPath(__DIR__ . '/data/gearboxes.csv');
        DB::table('auto_gearboxes')->insert($csv->fetchAssoc());
    }
}
