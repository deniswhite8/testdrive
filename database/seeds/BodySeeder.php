<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;

/**
 * Body type seeder
 */
class BodySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('auto_bodies')->delete();
        $csv = Reader::createFromPath(__DIR__ . '/data/bodies.csv');
        DB::table('auto_bodies')->insert($csv->fetchAssoc());
    }
}
