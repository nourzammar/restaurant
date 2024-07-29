<?php

namespace App\Models;
// use App\Models\Item;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
   protected $fillable = ['name', 'quantity', 'type', 'unit'];


    protected $casts = [
        'quantity' => 'decimal:2', // Cast the 'quantity' attribute to decimal with 2 decimal places
        'mines' => 'float',
    ];

    public function meals()
    {
        return $this->belongsToMany(meal::class , 'item_meals' , 'item_id');
    }
}
