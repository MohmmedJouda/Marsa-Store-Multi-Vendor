<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // أولاً، إنشاء الفئات
        $this->call([
            CategoriesSeeder::class,
        ]);

        // ثم، إنشاء 10 مستخدمين (vendors)
        // $vendors = \App\Models\User::factory()->count(10)->create([
        //     'role' => 'vendor', // تعيين role للمستخدمين كـ "vendor"
        // ]);

        // بعد إنشاء المستخدمين، قم بإنشاء متجر لكل مستخدم
        // foreach ($vendors as $vendor) {
        //     \App\Models\Store::factory()->create([
        //         'user_id' => $vendor->id,  // ربط المتجر بالمستخدم
        //     ]);
        // }

        // أخيرًا، قم بتشغيل Seeder المنتجات بعد المتاجر
        // $this->call(ProductSeeder::class);
    }
}
