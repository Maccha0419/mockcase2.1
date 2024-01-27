@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
<link href="{{ mix('css/like.css') }}" rel="stylesheet" type="text/css">
<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
@endsection

@section('content')
<div class="content">
    <div class="reservation__content">
        <div class="reservation__title">
            <p class="reservation__title-text">予約状況</p>
        </div>
        <div class="reservation__card">
            @foreach ($reservations as $reservation)
            <div class="reservation__card__title">
                <p class="reservation__card__title-content">予約{{$reservation->id}}</p>
            </div>
            <div class="reservation-table">
                <table class="reservation-table__inner">
                    <tr class="reservation-table__row">
                        <th class="reservation-table__header">Shop</th>
                    </tr>
                    <tr class="reservation-table__row">
                        <td class="reservation-table__item">{{$reservation->shop->shop_name}}</td>
                    </tr>

                    <tr class="reservation-table__row">
                        <th class="reservation-table__header">Date</th>
                    </tr>
                    <tr class="reservation-table__row">
                        <td class="reservation-table__item">{{$reservation->reservation_date}}</td>
                    </tr>

                    <tr class="reservation-table__row">
                        <th class="reservation-table__header">Time</th>
                    </tr>
                    <tr class="reservation-table__row">
                        <td class="reservation-table__item">{{$reservation->reservation_time}}</td>
                    </tr>

                    <tr class="reservation-table__row">
                        <th class="reservation-table__header">Number</th>
                    </tr>
                    <tr class="reservation-table__row">
                        <td class="reservation-table__item">{{$reservation->reservation_number}}</td>
                    </tr>
                </table>
            </div>
            @endforeach
        </div>
    </div>
    <div class="shop__content">
        <div class="shop__title">
            <p class="shop__title-text">お気に入り店舗</p>
        </div>
        <div id="like" >
            <div class="shop-card">
                @foreach ($like_shops as $key => $shop)
                <div class="card__inner">
                    <div class="card__image">
                        <img src="{{ $shop->shop_image }}" alt="">
                        <input name="shop_image" type="hidden" value="{{ $shop->shop_image }}">
                    </div>
                    <div class="card__content">
                        <div class="card__name">
                            <p class="shop_name">{{ $shop->shop_name }}</p>
                            <input name="shop_name" type="hidden" value="{{ $shop->shop_name }}">
                        </div>

                        <div class="card__text">
                            <p class="shop_area">#{{ $shop->shop_area }}</p>
                            <input name="shop_area" type="hidden" value="{{ $shop->shop_area }}">
                            <p class="shop_genre">#{{ $shop->shop_genre }}</p>
                            <input name="shop_genre" type="hidden" value="{{ $shop->shop_genre }}">
                        </div>

                        <div class="card__button">
                            <form class="card__button" action="/detail/{{ $shop->id }}" method="get">
                                @csrf
                                <input name="id" type="hidden" value="{{ $shop->id }}">
                                <button class="card__button-button">詳しく見る</button>
                            </form>
                            <div class="card__like">
                                <like-component
                                :shop-id="{{ json_encode($shop->id) }}"
                                :user-id="{{ json_encode($user->id) }}"
                                :default-Liked="{{ json_encode($shop->default_liked) }}"
                                ></like-component>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
</div>
@endsection