<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class meal extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia , SoftDeletes ;
    protected $table = 'meals';
    protected $primaryKey = 'meal_id';
    protected $fillable =[
        'name','price', 'type', 'photo'];
  

        public function billMeals()
        {
            return $this->hasMany(BillMeal::class);
        }
        

        public function items()
        {
            return $this->belongsToMany(Item::class , 'item_meals' , 'meal_id');
        }
    }