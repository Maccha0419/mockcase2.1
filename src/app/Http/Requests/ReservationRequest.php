<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ReservationRule;

class ReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function all($keys = null)
    {
        $results = parent::all($keys);
        $results['reservation_at'] = $results['reservation_date'].''.$results['reservation_time'];
        return $results;
    }
    public function rules()
    {
        dd($this);
        return [
            'reservation_date' => ['required','after:today'],
            'reservation_time' => 'required',
            'reservation_number' => 'required',
            'reservation_at' => new ReservationRule(
                $this->id,
                $this->user_id,
                $this->reservation_date,
                $this->reservation_time,
            )
        ];
    }
    public function messages()
    {
        return [
            'reservation_date.required' => '予約日を入力してください',
            'reservation_date.after' => '今日より後の日付を指定してください',
            'reservation_time.required' => '予約時間を入力してください',
            'reservation_number.required' => '予約人数を入力してください',
        ];
    }
}
