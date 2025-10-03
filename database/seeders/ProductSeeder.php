<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use App\Models\ProductVariant;        
use App\Models\ProductAttribute;      
use App\Models\ProductAttributeValue; 
use App\Models\ProductImage;         
// use App\Models\ProductVariantAttributeValue; 
class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::factory(1)->create()->each(function ($product) {

            // إنشاء Variants لكل منتج
            $variants = ProductVariant::factory(3)->create([
                'product_id' => $product->id,
            ]);

            // إنشاء Attributes لكل منتج
            $attributes = ProductAttribute::factory(3)->create([
                'product_id' => $product->id,
            ]);

            // إنشاء Values لكل ProductAttribute
            foreach ($attributes as $attribute) {
                ProductAttributeValue::factory(3)->create([
                    'product_attribute_id' => $attribute->id,
                ]);
            }

            // إضافة صور لكل منتج
            ProductImage::factory(3)->create([
                'product_id' => $product->id,
            ]);

            // إضافة الربط بين ProductVariant و ProductAttributeValues
            // foreach ($variants as $variant) {
            //     ProductVariantAttributeValue::factory(2)->create([
            //         'product_variant_id' => $variant->id,
            //         'product_attribute_id' => $attributes->random()->id,
            //         'product_attribute_value_id' => $attributes->random()->values->random()->id,
            //     ]);
            // }
        });
    }
}
