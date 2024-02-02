<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'purchase_price',
        'sale_price',
        'category_id',
        'quantity',
        'description',
        'user_id',
        'acquisition_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function productInventory()
    {
        return $this->hasMany(ProductInventory::class);
    }

    public function productSaleDetails()
    {
        return $this->hasMany(productSaleDetail::class);
    }
}
