<?php

namespace Database\Factories;

use App\Models\ProductAttribute;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductAttributeFactory extends Factory
{
    protected $model = ProductAttribute::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'product_id' => Product::factory(),  // ربط الخاصية مع المنتج
        ];
    }
}
