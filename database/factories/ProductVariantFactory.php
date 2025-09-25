<?php
namespace Database\Factories;

use App\Models\ProductVariant;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductVariantFactory extends Factory
{
    protected $model = ProductVariant::class;

    public function definition()
    {
        return [
            'combination' => [
                'color' => $this->faker->colorName,   // استخدام Faker لتوليد اسم اللون عشوائيًا
                'size' => $this->faker->randomElement(['S', 'M', 'L', 'XL']),  // توليد الحجم عشوائيًا
            ],
            'price' => $this->faker->randomFloat(2, 10, 500),  // توليد السعر عشوائيًا
            'quantity' => $this->faker->numberBetween(1, 100), // توليد الكمية عشوائيًا
            'sku' => $this->faker->unique()->word,  // توليد SKU فريد
            'image' => $this->faker->imageUrl(640, 480), // توليد رابط صورة عشوائيًا
            'product_id' => Product::factory(),  // ربط المنتج مع الـ ProductFactory
        ];
    }
}

