<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=> fake()->text(15),
            'poster'=> 'https://th.bing.com/th/id/OIP.FCgdZwkUWMUpPVUkCD1jRQHaLH?w=137&h=206&c=7&r=0&o=5&dpr=1.3&pid=1.7',
            'intro'=> fake()->text(50),
            'release_date'=> fake()->date(),
            'genre_id'=> rand(1,4)
        ];
    }
}
