<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            [
                'product_name' => 'Product A',
                'brand_id' => 1
            ],
            [
                'product_name' => 'Product B',
                'brand_id' => 1
            ],
            [
                'product_name' => 'Product C',
                'brand_id' => 1
            ],
            [
                'product_name' => 'Product D',
                'brand_id' => 2
            ],
            [
                'product_name' => 'Product E',
                'brand_id' => 2
            ],
            [
                'product_name' => 'Product F',
                'brand_id' => 2
            ],
        ];

        DB::table('product')->insert($posts);
    }
}
