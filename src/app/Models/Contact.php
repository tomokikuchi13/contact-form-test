<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'last_name', 'first_name', 'gender', 'email',
        'tel', 'address', 'building', 'category_id', 'content'
    ];

    // 正しいリレーション
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
