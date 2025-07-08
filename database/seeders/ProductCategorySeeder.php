<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_categories')->insert([
            'name' => 'Electronics',
            'slug' => Str::slug('Electronics'),
            'description' => 'Electronic devices and gadgets',
            'image' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
