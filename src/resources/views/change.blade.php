@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/change.css') }}">
<link href="{{ mix('css/like.css') }}" rel="stylesheet" type="text/css">
<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
@endsection

@section('content')
<div class="content">
    <div class="reservation__title">
        <h2 class="reservation__title-text">予約の変更</h2>
    </div>
    <div class="reservation__content">
        <div class="reservation__card">
            <div class="reservation__card-inner">
                <form class="reservation__change" action="/update" method="post">
                    @csrf
                    <div class="reservation-form">
                        <input class="reservation-form__id" name="reservation_id" type="hidden" value="{{ old('reservation_id', $request->id) }}">
                        <input class="reservation-form__id" name="id" type="hidden" value="{{ old('id', $shop_id->shop_id) }}">
                        <input class="reservation-form__id" name="user_id" type="hidden" value="{{ old('user_id', $request->user_id) }}">
                    </div>

                    <div class="confirm-group">
                        <div class="confirm__content">
                            <p>Shop</p>
                        </div>
                        <div class="confirm__content">
                            <input class="reservation-form__name" name="shop_name" type="text" value="{{ old('shop_name', $request->shop_name) }}" disabled>
                        </div>
                    </div>

                    <div class="confirm-group">
                        <div class="confirm__content">
                            <p>Date</p>
                        </div>
                        <div class="reservation-form__form">
                            <input class="reservation-form__date" name="reservation_date" type="date" value="{{ old('reservation_date ', $request->reservation_date) }}">
                        </div>
                    </div>
                    <div class="form__error">
                        @error('reservation_date')
                        {{ $message }}
                        @enderror
                    </div>

                    <div class="confirm-group">
                        <div class="confirm__content">
                            <p>Time</p>
                        </div>
                        <div class="reservation-form__form">
                            <input class="reservation-form__time" name="reservation_time" type="time" value="{{ old('reservation_time ', $request->reservation_time) }}" step="1800" list="data-list">
                            <datalist id="data-list">
                                <option value="09:00"></option>
                                <option value="09:30"></option>
                                <option value="10:00"></option>
                                <option value="10:30"></option>
                                <option value="11:00"></option>
                                <option value="11:30"></option>
                                <option value="12:00"></option>
                                <option value="12:30"></option>
                                <option value="13:00"></option>
                                <option value="13:30"></option>
                                <option value="14:00"></option>
                                <option value="14:30"></option>
                                <option value="15:00"></option>
                                <option value="15:30"></option>
                                <option value="16:00"></option>
                                <option value="16:30"></option>
                                <option value="17:00"></option>
                                <option value="17:30"></option>
                                <option value="18:00"></option>
                                <option value="18:30"></option>
                                <option value="19:00"></option>
                                <option value="19:30"></option>
                                <option value="20:00"></option>
                                <option value="21:30"></option>
                                <option value="21:00"></option>
                                <option value="22:30"></option>
                                <option value="22:00"></option>
                            </datalist>
                        </div>
                        <div class="form__error">
                            @error('reservation_time')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="confirm-group">
                        <div class="confirm__content">
                            <p>Number</p>
                        </div>
                        <div class="reservation-form__form">
                            <select class="reservation-form__number" name="reservation_number" value="{{ old('reservation_number ', $request->reservation_number) }}">
                                @if($request->reservation_number==1)
                                <option value="1" @if(old('reservation_number') == $request->reservation_number) selected @endif selected>1人</option>
                                <option value="2" @if(old('reservation_number') == $request->reservation_number) selected @endif>2人</option>
                                <option value="3" @if(old('reservation_number') == $request->reservation_number) selected @endif>3人</option>
                                <option value="4" @if(old('reservation_number') == $request->reservation_number) selected @endif>4人</option>
                                <option value="5" @if(old('reservation_number') == $request->reservation_number) selected @endif>5人</option>
                                <option value="6" @if(old('reservation_number') == $request->reservation_number) selected @endif>6人</option>
                                @endif
                                @if($request->reservation_number==2)
                                <option value="1" @if(old('reservation_number') == $request->reservation_number) selected @endif>1人</option>
                                <option value="2" @if(old('reservation_number') == $request->reservation_number) selected @endif selected>2人</option>
                                <option value="3" @if(old('reservation_number') == $request->reservation_number) selected @endif>3人</option>
                                <option value="4" @if(old('reservation_number') == $request->reservation_number) selected @endif>4人</option>
                                <option value="5" @if(old('reservation_number') == $request->reservation_number) selected @endif>5人</option>
                                <option value="6" @if(old('reservation_number') == $request->reservation_number) selected @endif>6人</option>
                                @endif
                                @if($request->reservation_number==3)
                                <option value="1" @if(old('reservation_number') == $request->reservation_number) selected @endif>1人</option>
                                <option value="2" @if(old('reservation_number') == $request->reservation_number) selected @endif>2人</option>
                                <option value="3" @if(old('reservation_number') == $request->reservation_number) selected @endif selected>3人</option>
                                <option value="4" @if(old('reservation_number') == $request->reservation_number) selected @endif>4人</option>
                                <option value="5" @if(old('reservation_number') == $request->reservation_number) selected @endif>5人</option>
                                <option value="6" @if(old('reservation_number') == $request->reservation_number) selected @endif>6人</option>
                                @endif
                                @if($request->reservation_number==4)
                                <option value="1" @if(old('reservation_number') == $request->reservation_number) selected @endif>1人</option>
                                <option value="2" @if(old('reservation_number') == $request->reservation_number) selected @endif>2人</option>
                                <option value="3" @if(old('reservation_number') == $request->reservation_number) selected @endif>3人</option>
                                <option value="4" @if(old('reservation_number') == $request->reservation_number) selected @endif selected>4人</option>
                                <option value="5" @if(old('reservation_number') == $request->reservation_number) selected @endif>5人</option>
                                <option value="6" @if(old('reservation_number') == $request->reservation_number) selected @endif>6人</option>
                                @endif
                                @if($request->reservation_number==5)
                                <option value="1" @if(old('reservation_number') == $request->reservation_number) selected @endif>1人</option>
                                <option value="2" @if(old('reservation_number') == $request->reservation_number) selected @endif selected>2人</option>
                                <option value="3" @if(old('reservation_number') == $request->reservation_number) selected @endif>3人</option>
                                <option value="4" @if(old('reservation_number') == $request->reservation_number) selected @endif>4人</option>
                                <option value="5" @if(old('reservation_number') == $request->reservation_number) selected @endif selected>5人</option>
                                <option value="6" @if(old('reservation_number') == $request->reservation_number) selected @endif>6人</option>
                                @endif
                                @if($request->reservation_number==6)
                                <option value="1" @if(old('reservation_number') == $request->reservation_number) selected @endif>1人</option>
                                <option value="2" @if(old('reservation_number') == $request->reservation_number) selected @endif selected>2人</option>
                                <option value="3" @if(old('reservation_number') == $request->reservation_number) selected @endif>3人</option>
                                <option value="4" @if(old('reservation_number') == $request->reservation_number) selected @endif>4人</option>
                                <option value="5" @if(old('reservation_number') == $request->reservation_number) selected @endif>5人</option>
                                <option value="6" @if(old('reservation_number') == $request->reservation_number) selected @endif selected>6人</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form__error">
                        @error('reservation_number')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="form__error">
                        @error('reservation_at')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="reservation-form__submit">
                        <button class="reservation-form__submit-button">予約を変更する</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection