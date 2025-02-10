<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = ['order_id', 'product_id', 'product_count'];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
