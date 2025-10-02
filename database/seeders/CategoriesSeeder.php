<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run()
{
   $electronics = Category::create(['name' => 'الكترونيات', 'image' => 'images/electronics.jpg']);
        $fashion = Category::create(['name' => 'موضة', 'image' => 'images/fashion.jpg']);
        $home_kitchen = Category::create(['name' => 'بيت & مطبخ', 'image' => 'images/home&kitchen.jpg']);
        $beauty = Category::create(['name' => 'الجمال & العناية الشخصية', 'image' => 'images/Beauty & Personal Care.jpg']);
        $books_stationery = Category::create(['name' => 'الكتب & الأدوات المكتبية', 'image' => 'images/books.jpg']);
        $toys_games = Category::create(['name' => 'الألعاب', 'image' => 'images/games.jpg']);
        $sports_outdoors = Category::create(['name' => 'رياضة & Outdoors', 'image' => 'images/sport.jpeg']);
        $automotive = Category::create(['name' => 'أغراض سيارات', 'image' => 'images/cars.jpg']);
        $health_wellness = Category::create(['name' => 'الصحة', 'image' => 'images/Health & Wellness.jpg']);

        // Subcategories for Electronics
        $electronics->subcategories()->createMany([
            ['name' => 'هواتف و أجهزة لوحية', 'image' => 'images/electronics.jpg'],
            ['name' => 'أجهزة لابتوب و كمبيوتر', 'image' => 'images/electronics.jpg'],
            ['name' => 'سماعات', 'image' => 'images/electronics.jpg'],
            ['name' => 'كاميرات', 'image' => 'images/electronics.jpg'],
            ['name' => 'أجهزة التلفاز', 'image' => 'images/electronics.jpg'],
            ['name' => 'أجهزة الالعاب', 'image' => 'images/electronics.jpg'],
            ['name' => 'ملحقات', 'image' => 'images/electronics.jpg'],
        ]);


        // Subcategories for Fashion
        $fashion->subcategories()->createMany([
            ['name' => 'ملابس رجال', 'image' => 'images/fashion.jpg' ],
            ['name' => 'ملابس نساء', 'image' => 'images/fashion.jpg' ],
            ['name' => 'أحذية', 'image' => 'images/fashion.jpg'],
            ['name' => 'حقائب', 'image' => 'images/fashion.jpg'],
            ['name' => 'ساعات', 'image' => 'images/fashion.jpg'],
            ['name' => 'نظارات شمسية', 'image' => 'images/fashion.jpg'],
            ['name' => 'مجوهرات', 'image' => 'images/fashion.jpg'],
        ]);

        // Subcategories for Home & Kitchen
        $home_kitchen->subcategories()->createMany([
            ['name' => 'أثاث', 'image' => 'images/home&kitchen.jpg'],
            ['name' => 'أجهزة المطبخ', 'image' => 'images/home&kitchen.jpg'],
            ['name' => 'أدوات الطبخ والأواني', 'image' => 'images/home&kitchen.jpg'],
            ['name' => 'ديكور المنزل', 'image' => 'images/home&kitchen.jpg'],
            ['name' => 'إضاءة', 'image' => 'images/home&kitchen.jpg'],
            ['name' => 'مفروشات وبياضات', 'image' => 'images/home&kitchen.jpg'],
            ['name' => 'مستلزمات التنظيف', 'image' => 'images/home&kitchen.jpg'],
        ]);

        // Subcategories for Beauty & Personal Care
        $beauty->subcategories()->createMany([
            ['name' => 'العناية بالبشرة', 'image' => 'images/Beauty & Personal Care.jpg'],
            ['name' => 'ماكياج', 'image' => 'images/Beauty & Personal Care.jpg'],
            ['name' => 'العناية بالشعر', 'image' => 'images/Beauty & Personal Care.jpg'],
            ['name' => 'العطور', 'image' => 'images/Beauty & Personal Care.jpg'],
            ['name' => 'العناية بالرجال', 'image' => 'images/Beauty & Personal Care.jpg'],
            ['name' => 'الاستحمام والجسم', 'image' => 'images/Beauty & Personal Care.jpg'],
            ['name' => 'الأدوات والملحقات', 'image' => 'images/Beauty & Personal Care.jpg'],
        ]);

        // Subcategories for Books & Stationery
        $books_stationery->subcategories()->createMany([
            ['name' => 'اللوازم المدرسية', 'image' => 'images/books.jpg'],
            ['name' => 'اللوازم المكتبية', 'image' => 'images/books.jpg'],
            ['name' => 'كتب الخيال', 'image' => 'images/books.jpg'],
            ['name' => 'كتب غير روائية', 'image' => 'images/books.jpg'],
            ['name' => 'كتب الأطفال', 'image' => 'images/books.jpg'],
            ['name' => 'الكتب التعليمية', 'image' => 'images/books.jpg'],
            ['name' => 'لوازم فنية', 'image' => 'images/books.jpg'],
        ]);

        // Subcategories for Toys & Games
        $toys_games->subcategories()->createMany([
            ['name' => 'ألعاب تعليمية', 'image' => 'images/games.jpg'],
            ['name' => 'شخصيات الحركة', 'image' => 'images/games.jpg'],
            ['name' => 'الألغاز وألعاب الطاولة', 'image' => 'images/games.jpg'],
            ['name' => 'حيوانات محشوة', 'image' => 'images/games.jpg'],
            ['name' => 'ألعاب خارجية', 'image' => 'images/games.jpg'],
            ['name' => 'ألعاب التحكم عن بعد', 'image' => 'images/games.jpg'],
            ['name' => 'كتل البناء', 'image' => 'images/games.jpg'],
        ]);

        // Subcategories for Sports & Outdoors
        $sports_outdoors->subcategories()->createMany([
            ['name' => 'معدات اللياقة البدنية', 'image' => 'images/sport.jpeg'],
            ['name' => 'ملابس رياضية', 'image' => 'images/sport.jpeg'],
            ['name' => 'الأحذية', 'image' => 'images/sport.jpeg'],
            ['name' => 'التخييم', 'image' => 'images/sport.jpeg'],
            ['name' => 'الدراجات الهوائية وملحقاتها', 'image' => 'images/sport.jpeg'],
            ['name' => 'الرياضات المائية', 'image' => 'images/sport.jpeg'],
            ['name' => 'الرياضات الجماعية', 'image' => 'images/sport.jpeg'],
        ]);

        // Subcategories for Automotive
        $automotive->subcategories()->createMany([
            ['name' => 'اكسسوارات السيارات', 'image' => 'images/cars.jpg'],
            ['name' => 'الزيوت والسوائل', 'image' => 'images/cars.jpg'],
            ['name' => 'إلكترونيات السيارات', 'image' => 'images/cars.jpg'],
            ['name' => 'الإطارات والعجلات', 'image' => 'images/cars.jpg'],
            ['name' => 'الأدوات والمعدات', 'image' => 'images/cars.jpg'],
            ['name' => 'التنظيف والتفصيل', 'image' => 'images/cars.jpg'],
            ['name' => 'قطع غيار الدراجات النارية', 'image' => 'images/cars.jpg'],
        ]);

        // Subcategories for Health & Wellness
        $health_wellness->subcategories()->createMany([
            ['name' => 'الفيتامينات والمكملات الغذائية', 'image' => 'images/Health & Wellness.jpg'],
            ['name' => 'المعدات الطبية', 'image' => 'images/Health & Wellness.jpg'],
            ['name' => 'مستلزمات الإسعافات الأولية', 'image' => 'images/Health & Wellness.jpg'],
            ['name' => 'العناية الشخصية', 'image' => 'images/Health & Wellness.jpg'],
            ['name' => 'تسكين الألم', 'image' => 'images/Health & Wellness.jpg'],
            ['name' => 'مراقبة الصحة', 'image' => 'images/Health & Wellness.jpg'],
            ['name' => 'إدارة الوزن', 'image' => 'images/Health & Wellness.jpg'],
        ]);
    }
}

