<?php

namespace Database\Factories;

use App\Models\Store;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    protected $model = Store::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->company;
        return [
            'name' => $name,
            'slug' => Str::slug($name) . '-' . Str::random(5),
            'description' => $this->faker->paragraph,
            'logo' => null,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'status' => $this->faker->randomElement(['approved', 'rejected', 'pending']),
        ];
    }
}
