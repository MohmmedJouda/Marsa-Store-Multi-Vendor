<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductAttributeValue;

class ProductAttribute extends Model
{
    use HasFactory;

    protected $fillable = ['name','product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function values()
    {
        return $this->hasMany(ProductAttributeValue::class, 'product_attribute_id');
    }


}
