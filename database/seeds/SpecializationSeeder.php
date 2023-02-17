<?php

use App\Specialization;
use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{

    public function run()
    {
        $specialization_names = config('specializations');

        foreach ($specialization_names as $specialization_name) {
            $specialization = Specialization::create([
                'name' => $specialization_name,
            ]);
        }
    }
}
