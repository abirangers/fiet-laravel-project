<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            Product::query()->create([
                'name' => 'Product ' . $i,
                'description' => 'Description for product ' . $i,
                'price' => rand(100, 1000),
                'stock' => rand(0, 100),
            ]);
        }
    }
}
