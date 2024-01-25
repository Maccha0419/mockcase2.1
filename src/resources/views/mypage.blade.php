@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="reservation-card">
        <div class="reservation__title">
            <h2 class="title">予約状況</h2>
        </div>
        @foreach ($reservations as $key => $reservation)
        <div class="attendance-table">
            <table class="attendance-table__inner">
                <tr class="attendance-table__row">
                    <th class="attendance-table__header">Shop</th>
                </tr>
                <tr class="attendance-table__row">
                    <td class="attendance-table__item">{{$reservation->shop_name}}</td>
                </tr>

                <tr class="attendance-table__row">
                    <th class="attendance-table__header">$Date</th>
                </tr>
                <tr class="attendance-table__row">
                    <td class="attendance-table__item">{{$reservation->reservation_date}}</td>
                </tr>

                <tr class="attendance-table__row">
                    <th class="attendance-table__header">Time</th>
                </tr>
                <tr class="attendance-table__row">
                    <td class="attendance-table__item">{{$reservation->reservation_time}}</td>
                </tr>

                <tr class="attendance-table__row">
                    <th class="attendance-table__header">Number</th>
                </tr>
                <tr class="attendance-table__row">
                    <td class="attendance-table__item">{{$reservation->reservation_number}}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="shop-card">
        <div class="card__inner">
            <div id="like" >
            @foreach ($shops as $key => $shop)
                <div class="card__image">
                    <img src="{{ $shop->shop_image }}" alt="">
                    <input name="shop_image" type="hidden" value="{{ $shop->shop_image }}">
                </div>

                <div class="card__name">
                    <p class="shop_name">{{ $shop->shop_name }}</p>
                    <input name="shop_name" type="hidden" value="{{ $shop->shop_name }}">
                </div>

                <div class="card__text">
                    <p class="shop_area">{{ $shop->shop_area }}</p>
                    <input name="shop_area" type="hidden" value="{{ $shop->shop_area }}">
                    <p class="shop_genre">{{ $shop->shop_genre }}</p>
                    <input name="shop_genre" type="hidden" value="{{ $shop->shop_genre }}">
                </div>

                <div class="card__button">
                    <form class="card__button" action="/detail/{{ $shop->id }}" method="post">
                        @csrf
                        <input name="id" type="hidden" value="{{ $shop->id }}">
                        <button class="card">詳しく見る</button>
                    </form>
                </div>

                <div class="card__like">
                    <like-component
                    :shop-id="{{ json_encode($shop->id) }}"
                    :user-id="{{ json_encode($user->id) }}"
                    :default-Liked="{{ json_encode($shop->default_liked) }}"
                    ></like-component>
                </div>

            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection