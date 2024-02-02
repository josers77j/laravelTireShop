<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaleDetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'sale_id', 
        'tire_id', 
        'quantity', 
        'sale_price', 
        'discount', 
        'total'
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function tire()
    {
        return $this->belongsTo(Tire::class);
    }
}
