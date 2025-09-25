<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $name = fake()->unique()->sentence(3);
        return [
            'name' => $name, // اسم المنتج
            'slug' => Str::slug($name), // slug المنتج
            'description' => $this->faker->text(200), // وصف المنتج
            'price' => $this->faker->randomFloat(2, 10, 1000), // سعر المنتج بين 10 و 1000
            'discount' => $this->faker->randomFloat(2, 0, 50), // خصم عشوائي بين 0 و 50
            'stock' => $this->faker->numberBetween(0, 100), // كمية المخزون
            'status' => $this->faker->randomElement(['active', 'inactive']), // حالة المنتج
            'is_featured' => $this->faker->boolean, // هل المنتج مميز؟
            'subcategory_id' => $this->faker->numberBetween(1, 10), // معرف الفئة الفرعية عشوائي
            'store_id' => 1, // ربط المنتج بالمتجر باستخدام StoreFactory
        ];
    }
}
