<?php

use App\User;
use App\Review;
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

        for ($i = 0; $i < 100; $i++){
            $review = Review::create([
                'user_id' => $faker->randomElement($users)->id,
                'text'  => $faker->paragraphs(rand(1, 10), true),
                'vote'  => $faker->numberBetween(1, 5),
                'guest_name' => $faker->firstName,
                'guest_last_name' => $faker->lastName
            ]);
        }
    }
}
