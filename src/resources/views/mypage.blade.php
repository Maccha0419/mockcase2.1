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
        @foreach ($reservations as $key => $reservation)
        <div class="reservation__card">
            <div class="reservation__card-inner">
                <div class="reservation__img"></div>
                <div class="reservation__card__title">
                    <p class="reservation__card__title-content">予約{{$key+1}}</p>
                </div>
                <form class="reservation__button" action="/mypage" method="post">
                    @csrf
                    <button class="reservation__delete"></button>
                    <input name="id" type="hidden" value="{{ $reservation->id }}">
                </form>
            </div>
            <div class="confirm">
                <div class="confirm__inner">
                    <div class="confirm-group">
                        <div class="confirm__content">
                            <p>Shop</p>
                        </div>
                        <div class="confirm__content">
                            <p>{{ $reservation->shop->shop_name }}</p>
                        </div>
                    </div>
                    <div class="confirm-group">
                        <div class="confirm__content">
                            <p>Date</p>
                        </div>
                        <div class="confirm__content">
                            <p>{{ $reservation->reservation_date }}</p>
                        </div>
                    </div>
                    <div class="confirm-group">
                        <div class="confirm__content">
                            <p>Time</p>
                        </div>
                        <div class="confirm__content">
                            <p>{{ $reservation->reservation_time }}</p>
                        </div>
                    </div>
                    <div class="confirm-group">
                        <div class="confirm__content-number">
                            <p>Number</p>
                        </div>
                        <div class="confirm__content">
                            <p>{{ $reservation->reservation_number }}人</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="shop__content">
        <div class="myname">
            <h2 class="reservation__title-text">{{$user->name}}さん</h2>
        </div>
        <div class="shop__title">
            <h3 class="shop__title-text">お気に入り店舗</h3>
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
@endsection