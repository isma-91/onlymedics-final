<?php

use App\User;
use App\Review;
use App\Message;
use Faker\Factory;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $faker = Factory::create('it_IT');
        $users = User::all('id')->all();

        //eventualmente correggere/togliere la variabile se non la si utilizza
        for ($i = 0; $i < 100; $i++){
            $message = Message::create([
                'user_id'           => $faker->randomElement($users)->id,
                'title'             => $faker->word(),
                'message'           => $faker->paragraphs(rand(1, 10), true),
                'guest_name'        => $faker->firstName,
                'guest_last_name' => $faker->lastName,
                'guest_email'       => $faker->email(),
            ]);
        }
    }
}
