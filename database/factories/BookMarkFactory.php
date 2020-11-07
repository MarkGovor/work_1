<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BookMarkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\BookMark::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'favicon' => 'uploads/' . rand(1,5) . '.png',
            'url' => $this->faker->unique()->url,
            'title' => $this->faker->title,
            'meta_keywords' => $this->faker->text(5),
            'meta_description' => $this->faker->text(20),
        ];
    }
}
