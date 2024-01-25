<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(Shop $shop, Request $request)
    {
        $like = Like::create(['user_id' => $request->user_id, 'shop_id' => $shop->id]);
        return response()->json([]);
    }
    public function unlike(Shop $shop, Request $request)
    {
        $like = Like::where('user_id', $request->user_id)->where('shop_id', $shop->id)->first();
        $like->delete();
        return response()->json([]);
    }
}