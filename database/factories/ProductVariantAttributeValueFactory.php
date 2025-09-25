<?php

namespace Database\Factories;

use App\Models\ProductVariantAttributeValue;
use App\Models\ProductVariant;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeValue;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductVariantAttributeValueFactory extends Factory
{
    protected $model = ProductVariantAttributeValue::class;

    public function definition()
    {
        return [
            'product_variant_id' => ProductVariant::factory(),
            'product_attribute_id' => ProductAttribute::factory(),
            'product_attribute_value_id' => ProductAttributeValue::factory(),
        ];
    }
}

