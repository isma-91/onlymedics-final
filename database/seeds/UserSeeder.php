<?php

use App\User;
use App\Sponsor;
use App\Specialization;
use Faker\Factory;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $faker = Factory::create('it_IT');
        $names = config('names');
        $sponsors = Sponsor::all()->pluck('id');
        $specializations = Specialization::all()->pluck('id');

        //Foreach per avere tutti i nomi differenti, ma da vedere se funzionerà quando faremo anche tutto il resto
        foreach ($names as $name) {
            $user = User::create([
                'name'              => $name['name'],
                'last_name'         => $name['last_name'],
                'address'           => $faker->address(),
                'curriculum_vitae'  => null,
                'uploaded_photo'    => null,
                'photo'             => 'https://picsum.photos/id/'. rand(0, 100) .'/500/400',
                'phone'             => $faker->phoneNumber(),
                'services'          => $faker->sentence(),
                'email'             => $faker->email(),
                'password'          => Hash::make($faker->word()),
            ]);

            $user->sponsors()->attach($faker->randomElements($sponsors, rand(0, 1)));
            $user->specializations()->attach($faker->randomElements($specializations, rand(1, 3)));
        }
    }
}
