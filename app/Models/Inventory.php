<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_id', 
        'tire_id', 
        'quantity', 
        'order_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tire()
    {
        return $this->belongsTo(Tire::class);
    }
    public function getorderdateAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
    }
    
    public function setorderdateAttribute($value)
    {
        $this->attributes['order_date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }
}
