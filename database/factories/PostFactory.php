<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $filePath = storage_path('images');
         return [
             'user_id' => 1,
             'text' => 'some text',
             'created_at' => Carbon::now()->toDateTimeString(),
         ];
    }
}
