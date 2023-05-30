<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        Product::truncate();

        $products = [
            [
                'name' => 'Product 1',
                'description' => 'lorem',
                'price' => 100.99,
            ],
            [
                'name' => 'Product 2',
                'description' => 'lorem i',
                'price' => 19.99,
            ],
            [
                'name' => 'Product 3',
                'description' => 'lorem ip',
                'price' => 29.99,
            ],
            [
                'name' => 'Product 4',
                'description' => 'lorem ips',
                'price' => 29.99,
            ],

        ];

        Product::insert($products);
    }
}
