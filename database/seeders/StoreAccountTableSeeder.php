<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreAccountTableSeeder extends Seeder
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
                'account_name' => 'Indomaret',
            ],
            [
                'account_name' => 'Hypermarket',
            ],
        ];

        DB::table('account_name')->insert($posts);
    }
}
