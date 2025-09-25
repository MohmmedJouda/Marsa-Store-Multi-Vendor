<?php

namespace Database\Factories;

use App\Models\ProductImage;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class ProductImageFactory extends Factory
{
    protected $model = ProductImage::class;

    public function definition()
    {
        // مسار الصورة المحلي
        $localImagePath = 'C:/Users/NADER/Pictures/Saved Pictures/download.jfif';

        // تحديد المسار في مجلد `storage/app/public/products/`
        $imagePath = 'products/' . basename($localImagePath);  // الحصول على اسم الصورة فقط

        // نسخ الصورة إلى المجلد `storage/app/public/products/`
        Storage::disk('public')->put($imagePath, file_get_contents($localImagePath));

        return [
            'product_id' => Product::factory(),
            'image_path' => $imagePath, // تخزين المسار في قاعدة البيانات
            'is_main' => $this->faker->boolean,
        ];
    }
}

