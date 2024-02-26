<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_code',
        'product_name',
        'category_id',
        'stock',
        'purchase_price',
        'selling_price',
        'description',
        'photo'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
