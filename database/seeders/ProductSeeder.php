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
        Product::create([
            'product_code' => 'BG-91321',
            'product_name' => 'The Visual MBA',
            'category_id' => 1,
            'stock' => 200,
            'purchase_price' => 100000,
            'selling_price' => 210000,
            'description' => 'Ini buku mba',
            'photo' => 'none'
        ]);
    }
}
