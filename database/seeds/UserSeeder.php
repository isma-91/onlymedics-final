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
        $names = [
            [
                'name' => 'Antonio',
                'last_name' => 'Rossi'
            ],
            [
                'name' => 'Giovanni',
                'last_name' => 'Trotta'
            ],
            [
                'name' => 'Henri',
                'last_name' => 'Kapidani'
            ],
            [
                'name' => 'Simone',
                'last_name' => 'Icardi'
            ],
            [
                'name' => 'Marcantonio',
                'last_name' => 'Bianchi'
            ],
            [
                'name' => 'Adriano',
                'last_name' => 'Grimaldi'
            ],
            [
                'name' => 'Luca',
                'last_name' => 'Lambiase'
            ],
            [
                'name' => 'Gino',
                'last_name' => 'Gigio'
            ],
            [
                'name' => 'Christian',
                'last_name' => 'De Sica'
            ],
            [
                'name' => 'Emma',
                'last_name' => 'Marrone'
            ],
            [
                'name' => 'Lavinia',
                'last_name' => 'Costa'
            ],
            [
                'name' => 'Laura',
                'last_name' => 'Pausini'
            ],
            [
                'name' => 'Marco',
                'last_name' => 'Baroncini'
            ],
            [
                'name' => 'Nicola',
                'last_name' => 'Bozzigoli'
            ],
            [
                'name' => 'Federica',
                'last_name' => 'Giordano'
            ],
            [
                'name' => 'Ludovica',
                'last_name' => 'Mancini'
            ],
            [
                'name' => 'Valentina',
                'last_name' => 'Rizzo'
            ],
            [
                'name' => 'Francesco',
                'last_name' => 'Oranzini'
            ],
            [
                'name' => 'Lorenzo',
                'last_name' => 'Palumbo'
            ],
            [
                'name' => 'Vittorio',
                'last_name' => 'Lo Preiato'
            ]
        ];

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
