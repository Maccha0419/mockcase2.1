<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Like;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class MyPageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $reservations = Reservation::with('shop')->where('user_id',$user->id)->get();

        $shops = Shop::get();
        $user -> load('likes');
        $defaultLikeds = $user->likes;
        foreach($shops as $shop){
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
        $like_shops = $shops->where('defaultliked',1);

        return view('mypage', compact('like_shops','reservations','user'));
    }

    public function delete(Request $request)
    {
        $reservation_id = $request->id;
        $delete = Reservation::where('id',$reservation_id)->delete();
        $user = Auth::user();
        $reservations = Reservation::with('shop')->where('user_id',$user->id)->get();

        $shops = Shop::get();
        $user -> load('likes');
        $defaultLikeds = $user->likes;
        foreach($shops as $shop){
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
        $like_shops = $shops->where('defaultliked',1);

        return redirect('/mypage')->with(compact('like_shops','reservations','user'));
    }
}
