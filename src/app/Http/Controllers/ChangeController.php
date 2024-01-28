<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;
use App\Models\Shop;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class ChangeController extends Controller
{
    public function index(Request $request)
    {
        $shop_id = Reservation::find($request->id)->first('shop_id');
        return view('change', compact('request', 'shop_id'));
    }

    public function update(ReservationRequest $request)
    {
        $data = Reservation::find($request->reservation_id);
        $data->update([
            'reservation_date' => $request->reservation_date,
            'reservation_time' => $request->reservation_time,
            'reservation_number' => $request->reservation_number,
        ]);
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
