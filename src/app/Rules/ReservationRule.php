<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;
use Auth;
use App\Models\Reservation;
use App\Models\Shop;

class ReservationRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    private $_id,
            $_reservation_date,
            $_reservation_time;

    public function __construct($id, $reservation_date, $reservation_time)
    {
        $this->_id = $id;
        $this->_reservation_date = $reservation_date;
        $this->_reservation_time = $reservation_time;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $shop = Reservation::where([
            ['shop_id', $this->_id],
            ['reservation_date', $this->_reservation_date],
            ['reservation_time', $this->_reservation_time],
        ])->doesntExist();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'この日時は既に予約が入っています。';
    }
}
