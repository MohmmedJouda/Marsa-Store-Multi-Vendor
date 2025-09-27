<?php

namespace App\Http\Controllers;

use \App\Models\ProductVariant;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeValue;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $storeId = Auth::user()->store->id;
        $products = Product::where('store_id', $storeId)->latest()->get();
        return view('users.vendor.Product.products', compact('products'));
    }

    public function create(Request $request)
    {
        // if ($request->has('subcategory_id')) {
        //     session(['return_subcategory_id' => $request->subcategory_id]);
        // }

        $attributes = ProductAttribute::all();
        $categories = Category::all();
        return view('users.vendor.Product.create', compact('categories', 'attributes'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'status' => 'required|in:active,inactive',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required',
            'main_image' => 'image|mimes:jpg,jpeg,png|required',
            'additional_images' => 'nullable|array|max:3|required',
            'additional_images.*' => 'mimes:jpg,jpeg,png|required',
            'subcategory_image' => 'nullable|image|mimes:jpg,jpeg,png',
            'discount' => 'nullable|numeric|min:0|max:100',
            'attributes' => 'nullable',
            'attributes.*.name' => 'required|string|max:255',
            'attributes.*.values' => 'required|array|min:1',
            'attributes.*.values.*' => 'required|string|max:255',
            'variants' => 'nullable|array',
            'variants.*.price' => 'required|numeric',
            'variants.*.quantity' => 'required|integer',
            'variants.*.attributes' => 'required|string',
            'variants.*.id' => 'nullable|integer|exists:product_variants,id',
            'variants.*.image' => 'nullable|file|image|mimes:jpg,jpeg,png',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }

        DB::beginTransaction();

        try {
            // توليد slug فريد
            $slug = Str::slug($request->name);
            $count = Product::where('slug', $slug)->count();
            $originalSlug = $slug;
            while ($count > 0) {
                $slug = $originalSlug . '-' . ($count + 1);
                $count = Product::where('slug', $slug)->count();
            }

            $store_id = Auth::user()->store->id;

            // التحقق من الفئة الفرعية
            if ($request->subcategory_id == 'other') {
                $subcategoryImagePath = 'images/iphone.png';
                if ($request->hasFile('subcategory_image')) {
                    $subcategoryImagePath = $request->file('subcategory_image')->store('subcategories', 'public');
                }

                $subcategory = Subcategory::create([
                    'name' => $request->new_subcategory_name,
                    'category_id' => $request->category_id,
                    'image' => $subcategoryImagePath,
                ]);
                $subcategory_id = $subcategory->id;
            } else {
                $subcategory_id = $request->subcategory_id;
            }

            // إنشاء المنتج
            $product = Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
                'status' => $request->status,
                'category_id' => $request->category_id,
                'subcategory_id' => $subcategory_id,
                'slug' => $slug,
                'store_id' => $store_id,
                'discount' => $request->discount ?? 0,
            ]);

            // الصور
            if ($request->hasFile('main_image')) {
                $mainImagePath = $request->file('main_image')->store('products', 'public');
                $product->images()->create(['image_path' => $mainImagePath, 'is_main' => true]);
            }

            if ($request->hasFile('additional_images')) {
                foreach ($request->file('additional_images') as $image) {
                    $imagePath = $image->store('products', 'public');
                    $product->images()->create(['image_path' => $imagePath, 'is_main' => false]);
                }
            }

            // السمات والخصائص
            if ($request->input('attributes')) {
                $attributes = json_decode($request->input('attributes'), true);

                if (json_last_error() === JSON_ERROR_NONE && is_array($attributes)) {
                    foreach ($attributes as $attribute) {
                        if (!empty($attribute['name'])) {
                            $productAttribute = ProductAttribute::create([
                                'product_id' => $product->id,
                                'name' => $attribute['name'],
                            ]);

                            foreach ($attribute['values'] as $value) {
                                if (!empty($value)) {
                                    ProductAttributeValue::create([
                                        'product_attribute_id' => $productAttribute->id,
                                        'value' => $value,
                                    ]);
                                }
                            }
                        }
                    }
                }
            }

            if ($request->has('variants') && is_array($request->variants)) {
                foreach ($request->variants as $variant) {
                    $combination = json_decode($variant['attributes'], true);

                    if (json_last_error() !== JSON_ERROR_NONE) {
                        return response()->json([
                            'message' => 'Invalid combination JSON format.',
                        ], 400);
                    }

                    $sku = $this->generateSku($product->name, $combination);

                    $imagePath = null;
                    if (isset($variant['image']) && $variant['image'] instanceof \Illuminate\Http\UploadedFile) {
                        $imagePath = $variant['image']->store('variant_images', 'public');
                    }

                    if($variant['quantity'] > 0){
                    $variantModel = ProductVariant::create([
                        'product_id' => $product->id,
                        'combination' => $combination,
                        'price' => $variant['price'],
                        'quantity' => $variant['quantity'],
                        'sku' => $sku,
                        'image' => $imagePath,
                    ]);
}
                    foreach ($combination as $attributeName => $valueName) {
                        $attribute = ProductAttribute::where('product_id', $product->id)
                            ->where('name', $attributeName)->first();

                        if ($attribute) {
                            $value = ProductAttributeValue::where('product_attribute_id', $attribute->id)
                                ->where('value', $valueName)->first();

                            if ($value) {
                                DB::table('product_variant_attribute_value')->insert([
                                    'product_variant_id' => $variantModel->id,
                                    'product_attribute_id' => $attribute->id,
                                    'product_attribute_value_id' => $value->id,
                                    'created_at' => now(),
                                    'updated_at' => now(),
                                ]);
                            }
                        }
                    }
                }
            }

            DB::commit();

            return response()->json([
                'message' => 'Product created successfully!',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'An error occurred while creating the product.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    // دالة لإنشاء الـ SKU
    private function generateSku($productName, $attributes)
    {
        $base = strtoupper(Str::slug($productName, ''));
        $parts = [];
        foreach ($attributes as $key => $value) {
            $parts[] = strtoupper(Str::slug($value, ''));
        }
        return $base . '-' . implode('-', $parts);
    }




    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        // يمكن تفعيل الكود التالي إذا أردت عرض صفحة المنتج
        $products = Product::where('slug', $slug)->firstOrFail();
        return view('users.vendor.Product.show', compact('products'));
        // return $product;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, Request $request)
    {
        if ($request->has('subcategory_id')) {
            session(['return_subcategory_id' => $request->subcategory_id]);
        }

        $product = Product::with(['attributes.values', 'subcategory.category'])->findOrFail($id);
        $categories = Category::with('subcategories')->get();
        return view('users.vendor.Product.edit', compact('product', 'categories'));
        // return response()->json([
        //     'id' => $product->id,
        //     'name' => $product->name,
        //     'description' => $product->description,
        //     'stock' => $product->stock,
        //     'status' => $product->status,
        //     'category_id' => $product->category_id,
        //     'subcategory_id' => $product->subcategory_id,
        //     'additional_images' => $product->main_image,
        //     'main_image' => $product->main_image,
        //     'subcategory_image' => $product->subcategory_image,
        //     'categories' => $categories,
        //     'product' => $product,
        // ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'status' => 'required|in:active,inactive',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png',
            'additional_images' => 'nullable|array|max:3',
            'additional_images.*' => 'image|mimes:jpg,jpeg,png',
            'subcategory_image' => 'nullable|image|mimes:jpg,jpeg,png',
            'discount' => 'nullable|numeric|min:0|max:100',
            'attributes' => 'nullable',
            'attributes.*.name' => 'required|string|max:255',
            'attributes.*.values' => 'required|array|min:1',
            'attributes.*.values.*' => 'required|string|max:255',
            'variants' => 'nullable|array',
            'variants.*.price' => 'nullable|numeric',
            'variants.*.quantity' => 'nullable|integer',
            'variants.*.attributes' => 'nullable|string',
            'variants.*.id' => 'nullable|integer|exists:product_variants,id',
            'variants.*.image' => 'nullable|file|image|mimes:jpg,jpeg,png',


        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
        }

        DB::beginTransaction();

        try {
            // Slug
            $slug = Str::slug($request->name);
            $count = Product::where('slug', $slug)->where('id', '!=', $product->id)->count();
            $originalSlug = $slug;
            while ($count > 0) {
                $slug = $originalSlug . '-' . ($count + 1);
                $count = Product::where('slug', $slug)->where('id', '!=', $product->id)->count();
            }

            // Subcategory
            if ($request->subcategory_id == 'other') {
                $subcategoryImagePath = 'images/iphone.png';
                if ($request->hasFile('subcategory_image')) {
                    $subcategoryImagePath = $request->file('subcategory_image')->store('subcategories', 'public');
                }

                $subcategory = Subcategory::create([
                    'name' => $request->new_subcategory_name,
                    'category_id' => $request->category_id,
                    'image' => $subcategoryImagePath,
                ]);
                $subcategory_id = $subcategory->id;
            } else {
                $subcategory_id = $request->subcategory_id;
            }

            // Update product
            $product->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
                'status' => $request->status,
                'category_id' => $request->category_id,
                'subcategory_id' => $subcategory_id,
                'slug' => $slug,
                'discount' => $request->discount ?? 0,
            ]);

            // الصور
            if ($request->hasFile('main_image')) {
                // حذف الصورة القديمة
                $oldMain = $product->images()->where('is_main', true)->first();
                if ($oldMain) {
                    Storage::disk('public')->delete($oldMain->image_path);
                    $oldMain->delete();
                }

                $mainImagePath = $request->file('main_image')->store('products', 'public');
                $product->images()->create(['image_path' => $mainImagePath, 'is_main' => true]);
            }

            if ($request->hasFile('additional_images')) {
                $product->images()->where('is_main', false)->delete();
                foreach ($request->file('additional_images') as $image) {
                    $imagePath = $image->store('products', 'public');
                    $product->images()->create(['image_path' => $imagePath, 'is_main' => false]);
                }
            }

            // حذف السمات القديمة
            $product->attributes()->delete();

            // إضافة السمات الجديدة
            if ($request->input('attributes')) {
                $attributes = json_decode($request->input('attributes'), true);
                if (json_last_error() === JSON_ERROR_NONE && is_array($attributes)) {
                    foreach ($attributes as $attribute) {
                        if (!empty($attribute['name'])) {
                            $productAttribute = ProductAttribute::create([
                                'product_id' => $product->id,
                                'name' => $attribute['name'],
                            ]);

                            foreach ($attribute['values'] as $value) {
                                if (!empty($value)) {
                                    ProductAttributeValue::create([
                                        'product_attribute_id' => $productAttribute->id,
                                        'value' => $value,
                                    ]);
                                }
                            }
                        }
                    }
                }
            }

            // حذف المتغيرات القديمة التي لم يتم إرسالها
            $sentIds = collect($request->variants)->pluck('id')->filter();

            if ($sentIds->isEmpty() && ProductVariant::where('product_id', $product->id)->exists()) {
                return response()->json(['message' => 'No variant IDs were sent, cannot safely delete.'], 400);
            }

            ProductVariant::where('product_id', $product->id)
                ->whereNotIn('id', $sentIds)
                ->delete();

            // تحديث أو إنشاء المتغيرات
            if ($request->has('variants') && is_array($request->variants)) {

                foreach ($request->variants as $index => $variant) {
                    $combination = json_decode($variant['attributes'], true);
                    if (json_last_error() !== JSON_ERROR_NONE) {
                        return response()->json(['message' => 'Invalid combination JSON format.'], 400);
                    }

                    $sku = $this->generateSku($product->name, $combination);
                    $variantImagePath = null; // سيتم تحديده لاحقًا

                    // أولًا: جلب الـ variant model إن كان موجودًا
                    $variantModel = isset($variant['id']) ? ProductVariant::find($variant['id']) : null;

                    // ثم نحاول تحديد الصورة
                    $variantImagePath = null;

                    if ($request->hasFile("variants.{$index}.image")) {
                        // صورة جديدة
                        $variantImagePath = $request->file("variants.{$index}.image")->store('variant_images', 'public');
                    } elseif ($variantModel && $variantModel->image) {
                        // صورة قديمة
                        $variantImagePath = $variantModel->image;
                    }

                    // ثم: تحديث أو إنشاء
                    if ($variantModel) {
                        // تحديث
                        $updateData = [
                            'combination' => $combination,
                            'price' => $variant['price'],
                            'quantity' => $variant['quantity'],
                            'sku' => $sku,
                        ];

                        // فقط إذا كانت القيمة ليست null أو فارغة، نضيف الصورة
                        if (!empty($variantImagePath)) {
                            $updateData['image'] = $variantImagePath;
                        }

                        $variantModel->update($updateData);
                    } else {
                        // إنشاء
                        $variantModel = ProductVariant::create([
                            'product_id' => $product->id,
                            'combination' => $combination,
                            'price' => $variant['price'],
                            'quantity' => $variant['quantity'],
                            'sku' => $sku,
                            'image' => $variantImagePath, // قد تكون صورة جديدة أو null
                        ]);
                    }

                    // حفظ القيم المرتبطة بالـ variant (مثل الخصائص)
                    DB::table('product_variant_attribute_value')->where('product_variant_id', $variantModel->id)->delete();

                    foreach ($combination as $attributeName => $valueName) {
                        $attribute = ProductAttribute::where('product_id', $product->id)
                            ->where('name', $attributeName)->first();

                        if ($attribute) {
                            $value = ProductAttributeValue::where('product_attribute_id', $attribute->id)
                                ->where('value', $valueName)->first();

                            if ($value) {
                                DB::table('product_variant_attribute_value')->insert([
                                    'product_variant_id' => $variantModel->id,
                                    'product_attribute_id' => $attribute->id,
                                    'product_attribute_value_id' => $value->id,
                                    'created_at' => now(),
                                    'updated_at' => now(),
                                ]);
                            }
                        }
                    }
                }
            }



            DB::commit();
            return response()->json(['message' => 'Product updated successfully!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'An error occurred while updating the product.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    protected function processProductAttributes(Product $product, array $attributesData)
    {
        // الحصول على IDs الحالية للسمات لتحديد ما يجب حذفه
        $currentAttributeIds = $product->attributes()->pluck('id')->toArray();
        $updatedAttributeIds = [];

        foreach ($attributesData as $attributeData) {
            // تحديث أو إنشاء سمة المنتج
            if (isset($attributeData['id'])) {
                $attribute = ProductAttribute::find($attributeData['id']);
                if ($attribute) {
                    $attribute->update(['name' => $attributeData['name']]);
                    $updatedAttributeIds[] = $attribute->id;
                }
            } else {
                $attribute = $product->attributes()->create(['name' => $attributeData['name']]);
                $updatedAttributeIds[] = $attribute->id;
            }

            // معالجة قيم السمات
            $this->processAttributeValues($attribute, $attributeData);
        }

        // حذف السمات التي لم تعد موجودة
        $attributesToDelete = array_diff($currentAttributeIds, $updatedAttributeIds);
        if (!empty($attributesToDelete)) {
            ProductAttribute::whereIn('id', $attributesToDelete)->delete();
        }
    }

    protected function processAttributeValues(ProductAttribute $attribute, array $attributeData)
    {
        $currentValueIds = $attribute->values()->pluck('id')->toArray();
        $updatedValueIds = [];

        foreach ($attributeData['values'] as $index => $valueName) {
            // تحديث أو إنشاء قيمة السمة
            $valueData = [
                'value' => $valueName,
                'product_attribute_id' => $attribute->id,
            ];

            // نستخدم الفهرس للوصول إلى السعر والكمية المقابلة
            // $price = $attributeData['prices'][$index] ?? 0;
            // $quantity = $attributeData['quantities'][$index] ?? 0;

            // نبحث عن قيمة موجودة بنفس الاسم لنفس السمة
            $value = ProductAttributeValue::where('product_attribute_id', $attribute->id)
                ->where('value', $valueName)
                ->first();

            if ($value) {
                $value->update($valueData);
                $updatedValueIds[] = $value->id;
            } else {
                $value = $attribute->values()->create($valueData);
                $updatedValueIds[] = $value->id;
            }
        }

        // حذف القيم التي لم تعد موجودة
        $valuesToDelete = array_diff($currentValueIds, $updatedValueIds);
        if (!empty($valuesToDelete)) {
            ProductAttributeValue::whereIn('id', $valuesToDelete)->delete();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $deleted = $product->delete();
        if ($deleted) {
            return response()->json([
                'title' => 'Deleted successfully',
                'icon' => 'success'
            ]);
        } else {
            return response()->json([
                'title' => 'Deleted Failed',
                'icon' => 'danger'
            ]);
        }
    }

    public function getSubcategories(Request $request)
    {
        $subcategories = Subcategory::where('category_id', $request->category_id)->get();

        return response()->json([
            'subcategories' => $subcategories
        ]);
    }

    public function trashed($id = null)
    {
        // إذا كان هناك id (subcategory_id)، عرض المهملات المرتبطة به
        if ($id) {
            $products = Product::onlyTrashed()
                ->where('store_id', Auth::id())
                ->where('subcategory_id', $id)
                ->latest()
                ->paginate();
        } else {
            // إذا لم يكن هناك id، عرض جميع المهملات بدون تصفية على subcategory_id
            $products = Product::onlyTrashed()
                ->where('store_id', Auth::id())
                ->latest()
                ->paginate();
        }

        return view('users.vendor.Product.trashed', compact('products', 'id'));
    }


    public function product_restore($id)
    {
        Product::onlyTrashed()->where('id', $id)->first()->restore();
        return redirect()->back()->with('success', 'Product restored successfully');
    }

    public function forceDelete($id)
    {
        $product = Product::onlyTrashed()->where('id', $id)->firstOrFail();

        $deleted = $product->forceDelete();

        if ($deleted) {
            return response()->json([
                'title' => 'Deleted successfully',
                'icon' => 'success'
            ]);
        } else {
            return response()->json([
                'title' => 'Delete failed',
                'icon' => 'danger'
            ]);
        }
    }
}
