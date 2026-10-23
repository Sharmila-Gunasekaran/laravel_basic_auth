<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $admin = User::updateOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Admin User', 'password' => Hash::make('Admin@123'), 'role' => User::ROLE_ADMIN]
        );

        User::updateOrCreate(
            ['email' => 'manager@example.com'],
            ['name' => 'Product Manager', 'password' => Hash::make('Manager@123'), 'role' => User::ROLE_PRODUCT_MANAGER]
        );

        $product_samples = [
            ['name' => 'Wireless Mouse', 'sku' => 'WM-001', 'price' => 799, 'stock' => 40],
            ['name' => 'Mechanical Keyboard', 'sku' => 'KB-002', 'price' => 3499, 'stock' => 15],
            ['name' => 'USB-C Hub', 'sku' => 'HUB-003', 'price' => 1999, 'stock' => 25],
        ];

        foreach ($product_samples as $item) {
            Product::updateOrCreate(
                [
                'sku' => $item['sku']
                ],
                $item + [
                'description' => 'Sample product',
                'created_by' => $admin->id,
                ]
            );
        }
    }
}