<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Topic>
 */
class TopicFactory extends Factory
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
            'topic_title'=>fake()->randomElement(['web design', 'Video Content', 'Investment', 'Podcast', 'Educator']),
            'category_id' => fake()->numberBetween(1, 9),
            'content' =>fake()->paragraph(),
            'trending'=> fake()->numberBetween(0, 1),
            'published' => fake()->numberBetween(0, 1),
            'image'=> $this->generateRandomImage(public_path('assests/images/topics')),
        ];
    }
}
