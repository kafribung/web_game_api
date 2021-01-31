<?php

namespace Database\Factories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Game::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'        => $this->faker->sentence,
            'duration'    => $this->faker->randomDigitNotNull,
            'description' => $this->faker->paragraph(10),
            'slug'        => \Str::slug($this->faker->sentence),
            'user_id'     => '1'
        ];
    }
}
