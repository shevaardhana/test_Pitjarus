<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportProductTableSeeder extends Seeder
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
                'store_id' => 1,
                'product_id' => 1,
                'compliance' => 1,
                'tanggal' => '2021-01-01',
            ],
            [
                'store_id' => 1,
                'product_id' => 2,
                'compliance' => 1,
                'tanggal' => '2021-01-01',
            ],
            [
                'store_id' => 1,
                'product_id' => 3,
                'compliance' => 0,
                'tanggal' => '2021-01-01',
            ],
            [
                'store_id' => 1,
                'product_id' => 4,
                'compliance' => 0,
                'tanggal' => '2021-01-01',
            ],
            [
                'store_id' => 1,
                'product_id' => 5,
                'compliance' => 1,
                'tanggal' => '2021-01-01',
            ],
            [
                'store_id' => 2,
                'product_id' => 1,
                'compliance' => 1,
                'tanggal' => '2021-01-01',
            ],
            [
                'store_id' => 2,
                'product_id' => 2,
                'compliance' => 0,
                'tanggal' => '2021-01-01',
            ],
            [
                'store_id' => 3,
                'product_id' => 1,
                'compliance' => 0,
                'tanggal' => '2021-01-01',
            ],
            [
                'store_id' => 3,
                'product_id' => 2,
                'compliance' => 1,
                'tanggal' => '2021-01-01',
            ],
            [
                'store_id' => 4,
                'product_id' => 1,
                'compliance' => 1,
                'tanggal' => '2021-01-01',
            ],
            [
                'store_id' => 5,
                'product_id' => 1,
                'compliance' => 1,
                'tanggal' => '2021-01-01',
            ],
        ];

        DB::table('report_product')->insert($posts);
    }
}
