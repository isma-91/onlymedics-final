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
        //TODO:invertire con reviews
        $names = Review::all()->pluck('guest_name');
        $last_names = Review::all()->pluck('guest_last_name');

        //eventualmente correggere/togliere la variabile se non la si utilizza
        for ($i = 0; $i < 100; $i++){
            $message = Message::create([
                'user_id'           => $faker->randomElement($users)->id,
                'title'             => $faker->word(),
                'message'           => $faker->paragraphs(rand(1, 10), true),
                'guest_name'        => $names->random(),
                'guest_last_name'   => $last_names->random(),
                'guest_email'       => $faker->email(),
            ]);
        }
    }
}
