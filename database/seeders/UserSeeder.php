<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Administrator User (super_admin)
        User::updateOrCreate(
            ['email' => 'admin@marsa.com'],
            [
                'name' => 'المدير العام',
                'password' => Hash::make('password'),
                'role' => 'super_admin',
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );

        // 2. Moderator User
        User::updateOrCreate(
            ['email' => 'moderator@marsa.com'],
            [
                'name' => 'مشرف النظام',
                'password' => Hash::make('password'),
                'role' => 'moderator',
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );

        // 3. 5 Customers
        $customersData = [
            ['name' => 'أحمد محمود', 'email' => 'customer1@marsa.com', 'phone' => '+966501234567'],
            ['name' => 'سارة علي', 'email' => 'customer2@marsa.com', 'phone' => '+966502345678'],
            ['name' => 'خالد عبد الله', 'email' => 'customer3@marsa.com', 'phone' => '+966503456789'],
            ['name' => 'مريم حسن', 'email' => 'customer4@marsa.com', 'phone' => '+966504567890'],
            ['name' => 'عمر الفاروق', 'email' => 'customer5@marsa.com', 'phone' => '+966505678901'],
        ];

        foreach ($customersData as $data) {
            $user = User::updateOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'password' => Hash::make('password'),
                    'role' => 'customer',
                    'is_active' => true,
                    'email_verified_at' => now(),
                ]
            );

            customer::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'phone' => $data['phone'],
                ]
            );
        }
    }
}
