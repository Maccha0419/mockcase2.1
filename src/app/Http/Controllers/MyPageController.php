<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Like;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class MyPageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $reservations = Reservation::with('shop')->where('user_id',$user->id)->get();
        dd($reservations);


        $shop_areas = Shop::groupBy('shop_area')->get('shop_area');
        $shop_genres = Shop::groupBy('shop_genre')->get('shop_genre');
        $shops = Shop::get();
        $user = Auth::user();
        $user -> load('likes');
        $defaultLikeds = $user->likes;

        foreach($shops as $shop){
            // dd($shop->first('shop_name'));
            foreach($defaultLikeds as $defaultLiked){
                if ($shop->id == $defaultLiked->shop_id){
                    $defaultLiked = Arr::add($shop,'dafaultLiked',1);
                    if($defaultLiked->dafaultLiked == 0){
                        $defaultLiked->dafaultLiked = null;
                        $defaultLiked = Arr::add($shop,'dafaultLiked',1);
                    }
                }else {
                    $defaultLiked = Arr::add($shop,'dafaultLiked',0);
                }
            }
        }
        return view('shop', compact('shops','shop_areas','shop_genres','user'));
    }
}
