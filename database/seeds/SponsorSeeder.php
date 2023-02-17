<?php

use App\Sponsor;
use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder
{

    public function run()
    {
        $sponsors = config('sponsors');

        foreach ($sponsors as $sponsor_details) {
            $sponsor = Sponsor::create([
                'title' => $sponsor_details['title'],
                'duration' => $sponsor_details['duration'],
                'description' => $sponsor_details['description'],
                'cost' => $sponsor_details['cost'],
            ]);
        }
    }
}
