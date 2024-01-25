<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use Auth;
use App\Models\Reservation;
use App\Models\Shop;

class ReservationController extends Controller
{
    public function reservation(ReservationRequest $request)
    {
        $user = Auth::user();
        Reservation::create([
            'user_id' => $user->id,
            'shop_id' => $request->id,
            'reservation_date' => $request->reservation_date,
            'reservation_time' => $request->reservation_time,
            'reservation_number' => $request->reservation_number,
        ]);
        return view('done');
    }
}
