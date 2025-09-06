<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            '商品のお届けについて',
            '注文内容の変更',
            '返品・交換',
            'その他'
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category, // name に統一
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
