<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SpecializationSeeder::class);
        $this->call(SponsorSeeder::class);
        $this->call(UserSeeder::class);
        //$this->call(Sponsor_UserSeeder::class);
        $this->call(MessageSeeder::class);
        $this->call(ReviewSeeder::class);
    }

}
