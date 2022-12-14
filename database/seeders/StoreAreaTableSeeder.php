<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreAreaTableSeeder extends Seeder
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
                'area_name' => 'DKI jakarta',
            ],
            [
                'area_name' => 'Jawa Barat',
            ],
            [
                'area_name' => 'Kalimantan',
            ],
            [
                'area_name' => 'Jawa Tengah',
            ],
            [
                'area_name' => 'Bali',
            ],
        ];

        DB::table('store_area')->insert($posts);
    }
}
