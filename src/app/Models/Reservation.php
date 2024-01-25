<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'shop_id',
        'reservation_date',
        'reservation_time',
        'reservation_number',
        ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function shop(){
        return $this->belongsTo(Shop::class);
    }
}
