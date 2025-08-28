<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;


class ParentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $electronics = Category::create(['name' => 'Electronics', 'image' => 'images/iphone.png']);
        $fashion = Category::create(['name' => 'Fashion', 'image' => 'images/iphone.png']);
        $home_kitchen = Category::create(['name' => 'Home & Kitchen', 'image' => 'images/iphone.png']);
        $beauty = Category::create(['name' => 'Beauty & Personal Care', 'image' => 'images/iphone.png']);
        $books_stationery = Category::create(['name' => 'Books & Stationery', 'image' => 'images/iphone.png']);
        $toys_games = Category::create(['name' => 'Toys & Games', 'image' => 'images/iphone.png']);
        $sports_outdoors = Category::create(['name' => 'Sports & Outdoors', 'image' => 'images/iphone.png']);
        $automotive = Category::create(['name' => 'Automotive', 'image' => 'images/iphone.png']);
        $grocery_food = Category::create(['name' => 'Grocery & Food', 'image' => 'images/iphone.png']);
        $health_wellness = Category::create(['name' => 'Health & Wellness', 'image' => 'images/iphone.png']);

        // Subcategories for Electronics
        $electronics->subcategories()->createMany([
            ['name' => 'Phones', 'image' => 'images/iphone.png'],
            ['name' => 'Laptops', 'image' => 'images/iphone.png'],
            ['name' => 'Tablets', 'image' => 'images/iphone.png'],
            ['name' => 'Smart Watches', 'image' => 'images/iphone.png'],
            ['name' => 'Headphones & Earbuds', 'image' => 'images/iphone.png'],
            ['name' => 'Cameras', 'image' => 'images/iphone.png'],
            ['name' => 'Televisions', 'image' => 'images/iphone.png'],
            ['name' => 'Gaming Consoles', 'image' => 'images/iphone.png'],
            ['name' => 'Accessories', 'image' => 'images/iphone.png'],
        ]);


        // Subcategories for Fashion
        $fashion->subcategories()->createMany([
            ['name' => 'Men\'s Clothing', 'image' => 'images/iphone.png', 'image' => 'images/iphone.png'],
            ['name' => 'Women\'s Clothing', 'image' => 'images/iphone.png', 'image' => 'images/iphone.png'],
            ['name' => 'Shoes', 'image' => 'images/iphone.png'],
            ['name' => 'Bags & Backpacks', 'image' => 'images/iphone.png'],
            ['name' => 'Watches', 'image' => 'images/iphone.png'],
            ['name' => 'Sunglasses & Eyewear', 'image' => 'images/iphone.png'],
            ['name' => 'Jewelry', 'image' => 'images/iphone.png'],
        ]);

        // Subcategories for Home & Kitchen
        $home_kitchen->subcategories()->createMany([
            ['name' => 'Furniture', 'image' => 'images/iphone.png'],
            ['name' => 'Kitchen Appliances', 'image' => 'images/iphone.png'],
            ['name' => 'Cookware & Utensils', 'image' => 'images/iphone.png'],
            ['name' => 'Home Decor', 'image' => 'images/iphone.png'],
            ['name' => 'Lighting', 'image' => 'images/iphone.png'],
            ['name' => 'Bedding & Linen', 'image' => 'images/iphone.png'],
            ['name' => 'Cleaning Supplies', 'image' => 'images/iphone.png'],
        ]);

        // Subcategories for Beauty & Personal Care
        $beauty->subcategories()->createMany([
            ['name' => 'Skincare', 'image' => 'images/iphone.png'],
            ['name' => 'Makeup', 'image' => 'images/iphone.png'],
            ['name' => 'Hair Care', 'image' => 'images/iphone.png'],
            ['name' => 'Fragrances', 'image' => 'images/iphone.png'],
            ['name' => 'Men\'s Grooming', 'image' => 'images/iphone.png'],
            ['name' => 'Bath & Body', 'image' => 'images/iphone.png'],
            ['name' => 'Tools & Accessories', 'image' => 'images/iphone.png'],
        ]);

        // Subcategories for Books & Stationery
        $books_stationery->subcategories()->createMany([
            ['name' => 'School Supplies', 'image' => 'images/iphone.png'],
            ['name' => 'Office Supplies', 'image' => 'images/iphone.png'],
            ['name' => 'Fiction Books', 'image' => 'images/iphone.png'],
            ['name' => 'Non-Fiction Books', 'image' => 'images/iphone.png'],
            ['name' => 'Children’s Books', 'image' => 'images/iphone.png'],
            ['name' => 'Educational Books', 'image' => 'images/iphone.png'],
            ['name' => 'Art Supplies', 'image' => 'images/iphone.png'],
        ]);

        // Subcategories for Toys & Games
        $toys_games->subcategories()->createMany([
            ['name' => 'Educational Toys', 'image' => 'images/iphone.png'],
            ['name' => 'Action Figures', 'image' => 'images/iphone.png'],
            ['name' => 'Puzzles & Board Games', 'image' => 'images/iphone.png'],
            ['name' => 'Stuffed Animals', 'image' => 'images/iphone.png'],
            ['name' => 'Outdoor Toys', 'image' => 'images/iphone.png'],
            ['name' => 'Remote Control Toys', 'image' => 'images/iphone.png'],
            ['name' => 'Building Blocks', 'image' => 'images/iphone.png'],
        ]);

        // Subcategories for Sports & Outdoors
        $sports_outdoors->subcategories()->createMany([
            ['name' => 'Fitness Equipment', 'image' => 'images/iphone.png'],
            ['name' => 'Sportswear', 'image' => 'images/iphone.png'],
            ['name' => 'Footwear', 'image' => 'images/iphone.png'],
            ['name' => 'Camping & Hiking', 'image' => 'images/iphone.png'],
            ['name' => 'Bicycles & Accessories', 'image' => 'images/iphone.png'],
            ['name' => 'Water Sports', 'image' => 'images/iphone.png'],
            ['name' => 'Team Sports', 'image' => 'images/iphone.png'],
        ]);

        // Subcategories for Automotive
        $automotive->subcategories()->createMany([
            ['name' => 'Car Accessories', 'image' => 'images/iphone.png'],
            ['name' => 'Oils & Fluids', 'image' => 'images/iphone.png'],
            ['name' => 'Car Electronics', 'image' => 'images/iphone.png'],
            ['name' => 'Tires & Wheels', 'image' => 'images/iphone.png'],
            ['name' => 'Tools & Equipment', 'image' => 'images/iphone.png'],
            ['name' => 'Cleaning & Detailing', 'image' => 'images/iphone.png'],
            ['name' => 'Motorcycle Parts', 'image' => 'images/iphone.png'],
        ]);

        // Subcategories for Grocery & Food
        $grocery_food->subcategories()->createMany([
            ['name' => 'Snacks', 'image' => 'images/iphone.png'],
            ['name' => 'Beverages', 'image' => 'images/iphone.png'],
            ['name' => 'Canned Goods', 'image' => 'images/iphone.png'],
            ['name' => 'Spices & Herbs', 'image' => 'images/iphone.png'],
            ['name' => 'Organic Products', 'image' => 'images/iphone.png'],
            ['name' => 'Breakfast Items', 'image' => 'images/iphone.png'],
            ['name' => 'Baking Essentials', 'image' => 'images/iphone.png'],
        ]);

        // Subcategories for Health & Wellness
        $health_wellness->subcategories()->createMany([
            ['name' => 'Vitamins & Supplements', 'image' => 'images/iphone.png'],
            ['name' => 'Medical Equipment', 'image' => 'images/iphone.png'],
            ['name' => 'First Aid Supplies', 'image' => 'images/iphone.png'],
            ['name' => 'Personal Care', 'image' => 'images/iphone.png'],
            ['name' => 'Pain Relief', 'image' => 'images/iphone.png'],
            ['name' => 'Health Monitoring', 'image' => 'images/iphone.png'],
            ['name' => 'Weight Management', 'image' => 'images/iphone.png'],
        ]);
    }
}
