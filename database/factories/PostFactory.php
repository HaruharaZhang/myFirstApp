<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = Faker::create();
        $message = '';
        while (strlen($message) < 300) {
            $message = implode("\n\n", $faker->paragraphs($faker->numberBetween(2, 5)));
        }
        if (strlen($message) > 500) {
            $message = substr($message, 0, 500);
        }
        return [
            //'user_id' => $faker -> randomNumber($min = 123456, $max = 123460),
            'user_id' => User::all()->random()->id,
            //'title' => Str::random(10),
            'title' => $faker->realText(rand(20, 50)),
            //'desc' => Str::random(20),
            'desc' => $faker->sentence,
            //'message' => Str::random(40),
            //'message' => $faker->text(),
            'message' => $message,
        ];
    }
}
