<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class itemMeal extends Model
{
    protected $table = 'item_meals';
    protected $fillable = ['meals_id', 'item_id', ];

    public function meal()
    {
        return $this->belongsTo(item::class, 'item_id' , meal::class , 'meals_id');
    }
}
