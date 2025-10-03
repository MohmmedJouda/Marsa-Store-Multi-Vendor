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

        $vendors = \App\Models\User::factory()->count(5)->create([
            'role' => 'vendor', 
        ]);

        foreach ($vendors as $vendor) {
            \App\Models\Store::factory()->create([
                'user_id' => $vendor->id,  // ربط المتجر بالمستخدم
            ]);
        }

        $this->call(ProductSeeder::class);
    }
}
