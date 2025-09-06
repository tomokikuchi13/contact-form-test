<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;
use App\Models\Category;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::first();

        Contact::create([
            'last_name' => '山田',
            'first_name' => '太郎',
            'gender' => 1,
            'email' => 'taro@example.com',
            'tel' => '09011112222',
            'address' => '東京都新宿区1-1-1',
            'building' => 'テストビル101',
            'category_id' => $category->id,
            'content' => '商品が届かないのですがどうすればいいですか？',
        ]);
    }
}
