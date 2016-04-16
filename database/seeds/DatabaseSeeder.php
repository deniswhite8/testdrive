<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/**
 * Database seeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(BodySeeder::class);
        $this->call(GearboxSeeder::class);
        $this->call(MarkSeeder::class);
        $this->call(ModelSeeder::class);
        $this->call(GenerationSeeder::class);
        $this->call(CitySeeder::class);

        Model::reguard();
    }
}