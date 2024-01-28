<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Like;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class ShopController extends Controller
{
    public function index()
    {
        $shop_areas = Shop::groupBy('shop_area')->get('shop_area');
        $shop_genres = Shop::groupBy('shop_genre')->get('shop_genre');
        $shops = Shop::get();
        $user = Auth::user();
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
        return view('shop', compact('shops','shop_areas','shop_genres','user'));
    }

    public function detail($id)
    {
        $shop = Shop::where('id', $id)->first();
        $user = Auth::user();
        return view('detail', compact('shop','user'));
    }

    public function search(Request $request)
    {
        $shop_areas = Shop::groupBy('shop_area')->get('shop_area');
        $shop_genres = Shop::groupBy('shop_genre')->get('shop_genre');
        $shops = Shop::ShopareaSearch($request->shop_area)->ShopgenreSearch($request->shop_genre)->KeywordSearch($request->keyword)->get();

        $user = Auth::user();
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
        return view('shop', compact('shops','shop_areas','shop_genres','user'));
    }
}
