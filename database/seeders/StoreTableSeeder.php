<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreTableSeeder extends Seeder
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
                'store_name' => 'Indomaret Djakarta',
                'account_id' => 1,
                'area_id' => 1,
                'is_active' => 1,
            ],
            [
                'store_name' => 'Indomaret Jawa Barat',
                'account_id' => 1,
                'area_id' => 2,
                'is_active' => 1,
            ],
            [
                'store_name' => 'Indomaret Kalimantan',
                'account_id' => 1,
                'area_id' => 3,
                'is_active' => 1,
            ],
            [
                'store_name' => 'Indomaret Jawa Tengah',
                'account_id' => 1,
                'area_id' => 4,
                'is_active' => 1,
            ],
            [
                'store_name' => 'Indomaret Bali',
                'account_id' => 1,
                'area_id' => 5,
                'is_active' => 1,
            ],
        ];

        DB::table('store')->insert($posts);
    }
}
