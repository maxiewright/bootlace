<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'image_path' => $this->faker->imageUrl(),
            'title' => $this->faker->sentence(),
            'body' => $this->faker->text(2400),
            'author' => User::factory(),
            'status_id' => Status::all()->random()->id,
            'parent' => null
        ];
    }
}
