<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warranty extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'sale_id', 
        'start_date', 
        'end_date', 
        'details'];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
