<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product_category = [
            [
                'category_name' => 'Bola lampu',
                'description' => 'Product bola lampu terjamin kualitas dan keaslian product kami dan sudah di uji.'
            ]
        ];

        \App\Models\ProductCategory::insert($product_category);
    }
}
