<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'shop_name',
        'shop_area',
        'shop_genre',
        'shop_overview',
        'shop_image',
        ];

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }
    public function evaluations(){
        return $this->hasMany(Like::class);
    }

    protected $appends = ['defaultLiked' ];
    public function getDefaultLikedAttribute()
    {
        if($this->dafaultLiked === 1){
            return true;
        }else{
            return false;
        }
    }

    public function scopeShopareaSearch($query, $shop_area){
        if (!empty($shop_area)) {
            $query->where('shop_area', $shop_area);
        }
    }
    public function scopeShopgenreSearch($query, $shop_genre){
        if (!empty($shop_genre)) {
            $query->where('shop_genre', $shop_genre);
        }
    }
    public function scopeKeywordSearch($query, $keyword){
        if (!empty($keyword)) {
            $query->where('shop_name', 'like', '%' . $keyword . '%')->orwhere('shop_overview', 'like', '%' . $keyword . '%');
        }
    }
}
