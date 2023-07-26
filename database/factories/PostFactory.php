<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryIds = DB::table('categories')->pluck('id')->toArray();
        $title = $this->faker->sentence(2);

        return [
            'name' => rtrim($title, '.'),
            'slug' => $this->faker->unique()->slug(),
            'description' => Str::slug($title),
            'code' => '<button class="relative group overflow-hidden px-6 h-12 rounded-full flex space-x-2 items-center bg-gradient-to-r from-pink-500 to-purple-500 hover:to-purple-600"> <span class="relative text-sm text-white">Get Started</span> <div class="flex items-center -space-x-3 translate-x-3"> <div class="w-2.5 h-[1.6px] rounded bg-white origin-left scale-x-0 transition duration-300 group-hover:scale-x-100"></div> <svg stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" fill="none" class="h-5 w-5 stroke-white -translate-x-2 transition duration-300 group-hover:translate-x-0" xmlns="http://www.w3.org/2000/svg"> <path d="M9 5l7 7-7 7" stroke-linejoin="round" stroke-linecap="round"></path> </svg> </div> </button>',
            'views' => $this->faker->numberBetween($min = 1000, $max = 900000),
            'status' => 'Active',
            'theme' => $this->faker->randomElement(['Dark/Light', 'Dark', 'Light']),
            'user_id' => 1,
            'category_id' => $this->faker->randomElement($categoryIds),
        ];
    }
}
