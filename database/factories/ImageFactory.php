<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Image;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            //'url' => $this->faker->image(public_path('posts1'), 640, 480, null, false)
            'url' => 'posts/' . $this->faker->image('public/storage/posts', 640, 480, null, false)
            /*'url' => 'posts/' . $this->faker->image(public_path('posts'), 640, 480, null, false),*/

        ];
    }
}
