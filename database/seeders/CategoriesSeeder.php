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
            ['name' => 'هواتف و أجهزة لوحية', 'image' => 'images/iphone.png'],
            ['name' => 'أجهزة لابتوب و كمبيوتر', 'image' => 'images/iphone.png'],
            ['name' => 'سماعات', 'image' => 'images/iphone.png'],
            ['name' => 'كاميرات', 'image' => 'images/iphone.png'],
            ['name' => 'أجهزة التلفاز', 'image' => 'images/iphone.png'],
            ['name' => 'أجهزة الالعاب', 'image' => 'images/iphone.png'],
            ['name' => 'ملحقات', 'image' => 'images/iphone.png'],
        ]);


        // Subcategories for Fashion
        $fashion->subcategories()->createMany([
            ['name' => 'ملابس رجال', 'image' => 'images/iphone.png' ],
            ['name' => 'ملابس نساء', 'image' => 'images/iphone.png' ],
            ['name' => 'أحذية', 'image' => 'images/iphone.png'],
            ['name' => 'حقائب', 'image' => 'images/iphone.png'],
            ['name' => 'ساعات', 'image' => 'images/iphone.png'],
            ['name' => 'نظارات شمسية', 'image' => 'images/iphone.png'],
            ['name' => 'مجوهرات', 'image' => 'images/iphone.png'],
        ]);

        // Subcategories for Home & Kitchen
        $home_kitchen->subcategories()->createMany([
            ['name' => 'أثاث', 'image' => 'images/iphone.png'],
            ['name' => 'أجهزة المطبخ', 'image' => 'images/iphone.png'],
            ['name' => 'أدوات الطبخ والأواني', 'image' => 'images/iphone.png'],
            ['name' => 'ديكور المنزل', 'image' => 'images/iphone.png'],
            ['name' => 'إضاءة', 'image' => 'images/iphone.png'],
            ['name' => 'مفروشات وبياضات', 'image' => 'images/iphone.png'],
            ['name' => 'مستلزمات التنظيف', 'image' => 'images/iphone.png'],
        ]);

        // Subcategories for Beauty & Personal Care
        $beauty->subcategories()->createMany([
            ['name' => 'العناية بالبشرة', 'image' => 'images/iphone.png'],
            ['name' => 'ماكياج', 'image' => 'images/iphone.png'],
            ['name' => 'العناية بالشعر', 'image' => 'images/iphone.png'],
            ['name' => 'العطور', 'image' => 'images/iphone.png'],
            ['name' => 'العناية بالرجال', 'image' => 'images/iphone.png'],
            ['name' => 'الاستحمام والجسم', 'image' => 'images/iphone.png'],
            ['name' => 'الأدوات والملحقات', 'image' => 'images/iphone.png'],
        ]);

        // Subcategories for Books & Stationery
        $books_stationery->subcategories()->createMany([
            ['name' => 'اللوازم المدرسية', 'image' => 'images/iphone.png'],
            ['name' => 'اللوازم المكتبية', 'image' => 'images/iphone.png'],
            ['name' => 'كتب الخيال', 'image' => 'images/iphone.png'],
            ['name' => 'كتب غير روائية', 'image' => 'images/iphone.png'],
            ['name' => 'كتب الأطفال', 'image' => 'images/iphone.png'],
            ['name' => 'الكتب التعليمية', 'image' => 'images/iphone.png'],
            ['name' => 'لوازم فنية', 'image' => 'images/iphone.png'],
        ]);

        // Subcategories for Toys & Games
        $toys_games->subcategories()->createMany([
            ['name' => 'ألعاب تعليمية', 'image' => 'images/iphone.png'],
            ['name' => 'شخصيات الحركة', 'image' => 'images/iphone.png'],
            ['name' => 'الألغاز وألعاب الطاولة', 'image' => 'images/iphone.png'],
            ['name' => 'حيوانات محشوة', 'image' => 'images/iphone.png'],
            ['name' => 'ألعاب خارجية', 'image' => 'images/iphone.png'],
            ['name' => 'ألعاب التحكم عن بعد', 'image' => 'images/iphone.png'],
            ['name' => 'كتل البناء', 'image' => 'images/iphone.png'],
        ]);

        // Subcategories for Sports & Outdoors
        $sports_outdoors->subcategories()->createMany([
            ['name' => 'معدات اللياقة البدنية', 'image' => 'images/iphone.png'],
            ['name' => 'ملابس رياضية', 'image' => 'images/iphone.png'],
            ['name' => 'الأحذية', 'image' => 'images/iphone.png'],
            ['name' => 'التخييم', 'image' => 'images/iphone.png'],
            ['name' => 'الدراجات الهوائية وملحقاتها', 'image' => 'images/iphone.png'],
            ['name' => 'الرياضات المائية', 'image' => 'images/iphone.png'],
            ['name' => 'الرياضات الجماعية', 'image' => 'images/iphone.png'],
        ]);

        // Subcategories for Automotive
        $automotive->subcategories()->createMany([
            ['name' => 'اكسسوارات السيارات', 'image' => 'images/iphone.png'],
            ['name' => 'الزيوت والسوائل', 'image' => 'images/iphone.png'],
            ['name' => 'إلكترونيات السيارات', 'image' => 'images/iphone.png'],
            ['name' => 'الإطارات والعجلات', 'image' => 'images/iphone.png'],
            ['name' => 'الأدوات والمعدات', 'image' => 'images/iphone.png'],
            ['name' => 'التنظيف والتفصيل', 'image' => 'images/iphone.png'],
            ['name' => 'قطع غيار الدراجات النارية', 'image' => 'images/iphone.png'],
        ]);

        // Subcategories for Health & Wellness
        $health_wellness->subcategories()->createMany([
            ['name' => 'الفيتامينات والمكملات الغذائية', 'image' => 'images/iphone.png'],
            ['name' => 'المعدات الطبية', 'image' => 'images/iphone.png'],
            ['name' => 'مستلزمات الإسعافات الأولية', 'image' => 'images/iphone.png'],
            ['name' => 'العناية الشخصية', 'image' => 'images/iphone.png'],
            ['name' => 'تسكين الألم', 'image' => 'images/iphone.png'],
            ['name' => 'مراقبة الصحة', 'image' => 'images/iphone.png'],
            ['name' => 'إدارة الوزن', 'image' => 'images/iphone.png'],
        ]);
    }
}

