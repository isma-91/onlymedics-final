<?php

use App\User;
use App\Review;
use App\Message;
use Faker\Factory;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all('id')->all();
        $faker = Factory::create('it_IT');

        //da rivedere perchè mescola nomi e cognomi
        $names = Message::all()->pluck('guest_name');
        $last_names = Message::all()->pluck('guest_last_name');

        for ($i = 0; $i < 100; $i++){
            $review = Review::create([
                'user_id'         => $faker->randomElement($users)->id,
                'text'            => $faker->paragraphs(rand(1, 10), true),
                'vote'            => $faker->numberBetween(1, 5),
                'guest_name'      => $names->random(),
                'guest_last_name' => $last_names->random(),
            ]);
        }
    }
}
