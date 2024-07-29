<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Reservation extends Model
{
    protected $table = 'reservations';
    protected $primaryKey = 'reservations_id';
    protected $fillable = [
        'reservations_id',
        'user_id',
        'guest_number',
        'table_number',
        'status',
        'datetime',
    ];

    public function users()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
}
