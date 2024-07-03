<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {
        return [
            //
            'path' => fake()->unique()->randomElement([
                'media/example1.jpg', 
                'media/example2.jpg', 
                'media/example3.jpg', 
                'media/example4.jpg', 
                'media/example5.jpg',
                'media/example6.jpg', 
                'media/example7.jpg', 
                'media/example8.jpg', 
                'media/example9.jpg', 
                'media/example10.jpg',
                'media/example11.jpg', 
                'media/example12.jpg', 
                'media/example13.jpg', 
                'media/example14.jpg', 
                'media/example15.jpg'
            ]),

        ];
    }
}
