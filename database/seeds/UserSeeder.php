<?php

use App\User;
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

        $names = config('names');
        $faker = Factory::create('it_IT');

        //Foreach per avere tutti i nomi differenti, ma da vedere se funzionerà quando faremo anche tutto il resto
        foreach ($names as $name) {
            $user = User::create([
                'name'              => $name['name'],
                'last_name'         => $name['last_name'],
                'address'           => $faker->address(),
                'curriculum_vitae'  => null,
                'photo'             => 'https://picsum.photos/id/'. rand(0, 100) .'/500/400',
                'phone'             => $faker->phoneNumber(),
                'services'          => $faker->paragraph(),
                'email'             => $faker->email(),
                'password'          => Hash::make($faker->word()),
            ]);
        }
    }
}
