<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     private function generateRandomImage($path)
     {
         $files = scandir($path);
         $files = array_diff($files, array('.', '..'));
 
         return fake()->randomElement($files);
     }
     
    public function definition(): array
    {
        return [
            'name'=> fake()->name(),
            'content' => fake()->sentence(),
            'published'=> fake()->numberBetween(0, 1),
            'image' => $this->generateRandomImage(public_path('assests/images/testimonials')),
        ];
    }
}
