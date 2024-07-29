<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillMeal extends Model
{
    use HasFactory;

    protected $table = 'bill_meals';
    protected $primaryKey = 'BillMeal_id';

    public function meals()
    {
       return $this->belongsTo(meal::class, 'meal_id' );
    } 
}
