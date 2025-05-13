<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCategory; // <-- Tambahkan ini
use App\Models\OrderDetail;      // Kalau belum ditambahkan juga ini

class Products extends Model
{
    protected $fillable = [ 
        'name', 'slug', 'sku', 'description', 'price',
        'stock', 'product_category_id', 'image_url', 'is_active',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
