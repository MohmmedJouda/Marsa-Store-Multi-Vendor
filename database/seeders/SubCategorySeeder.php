<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subcategory;
use App\Models\Category;
use Faker\Factory as Faker;
class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // الحصول على الفئات الرئيسية الموجودة
        $categories = Category::all();

        // إنشاء 5 فئات فرعية عشوائية لكل فئة رئيسية
        foreach ($categories as $category) {
            for ($i = 0; $i < 5; $i++) {
                Subcategory::create([
                    'name' => $faker->word, // اسم الفئة الفرعية
                    'slug' => $faker->slug, // slug الفئة الفرعية
                    'description' => $faker->text(100), // وصف عشوائي للفئة الفرعية
                    'image' => $faker->imageUrl(640, 480), // صورة عشوائية
                    'is_active' => $faker->boolean, // حالة الفئة الفرعية
                    'category_id' => $category->id, // ربط الفئة الفرعية بالفئة الرئيسية
                ]);
            }
        }
    }
}
