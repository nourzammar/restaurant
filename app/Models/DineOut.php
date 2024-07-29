<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DineOut extends Model
{
    use HasFactory;

    protected $table = 'dine_outs';
    protected $fillable = ['DineOut_id', 'quantity','order_time'];
    public function meal()
    {
        return $this->belongsTo(Meal::class, 'meal_id');
    }
    
    
}