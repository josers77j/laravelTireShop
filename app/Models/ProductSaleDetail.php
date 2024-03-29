<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductSaleDetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'sale_id',
        'product_id',
        'quantity',
        'sale_price',
        'discount'
    ];
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
