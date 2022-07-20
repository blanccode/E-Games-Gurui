<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'title' => 'A Wonderfull Article Title',
            'text' => 'Article Text here..',
            'image' => 'https://picsum.photos/200/300',
            'read_duration' => 3,
        ];
    }
}
