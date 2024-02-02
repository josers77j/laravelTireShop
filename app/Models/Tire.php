<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tire extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'profile', 
        'width', 
        'rim_diameter', 
        'description', 
        'quantity', 
        'purchase_price', 
        'sale_price', 
        'acquisition_date', 
        'brand_id', 
        'category_id', 
        'user_id', 
        'status'
    ];
    public const STATUS = ['Nuevo', 'Segunda mano', 'Contingencia'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getacquisitiondateAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
    }
    
    public function setacquisitiondateAttribute($value)
    {
        $this->attributes['acquisition_date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }
}
