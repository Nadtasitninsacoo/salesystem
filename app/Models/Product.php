<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['name', 'description', 'price', 'stock', 'category_id', 'image'];

    // เชื่อมความสัมพันธ์กับ Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }    
}
