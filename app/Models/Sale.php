<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'client_id', 
        'user_id', 
        'total_sale', 
        'sale_date',
        'status'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sale_details()
    {
        return $this->hasMany(SaleDetail::class);
    }

    public function warranties()
    {
        return $this->hasMany(Warranty::class);
    }
}
