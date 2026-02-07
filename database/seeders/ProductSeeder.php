<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Radiant Glow Serum',
                'description' => 'A powerful vitamin C serum that brightens and evens out skin tone. Perfect for daily use.',
                'price' => 45.00,
                'category' => 'Skin Care',
                'image_path' => null, // Placeholder or use a real URL if I have one, but null uses the CSS placeholder
            ],
            [
                'name' => 'Hydrating Night Cream',
                'description' => 'Deeply moisturizing night cream with hyaluronic acid and shea butter for overnight repair.',
                'price' => 38.00,
                'category' => 'Skin Care',
                'image_path' => null,
            ],
            [
                'name' => 'Organic Rose Water Toner',
                'description' => 'Refreshing and soothing toner made from 100% organic rose petals. balances pH levels.',
                'price' => 22.00,
                'category' => 'Skin Care',
                'image_path' => null,
            ],
            [
                'name' => 'Silk Protein Hair Mask',
                'description' => 'Intensive repair mask for damaged hair. Infused with silk proteins and argan oil.',
                'price' => 32.00,
                'category' => 'Hair Care',
                'image_path' => null,
            ],
            [
                'name' => 'Revitalizing Eye Cream',
                'description' => 'Reduces puffiness and dark circles. Gentle formula suitable for sensitive eyes.',
                'price' => 29.00,
                'category' => 'Skin Care',
                'image_path' => null,
            ],
            [
                'name' => 'Gentle Foaming Cleanser',
                'description' => 'Removes impurities without stripping natural oils. Ideal for all skin types.',
                'price' => 18.00,
                'category' => 'Cleansers',
                'image_path' => null,
            ],
        ];

        foreach ($products as $product) {
            Product::firstOrCreate(
                ['slug' => Str::slug($product['name'])],
                array_merge($product, [
                    'stock' => 100
                ])
            );
        }
    }
}
