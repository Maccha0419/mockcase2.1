@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="shop-card">
        <div class="card__button">
            <form class="card__button" action="/" method="get">
                @csrf
                <button class="card"></button>
            </form>
        </div>

        <div class="card__name">
            <p class="shop_name">{{ $shop->shop_name }}</p>
            <input name="shop_name" type="hidden" value="{{ old('shop_name', $shop->shop_name) }}">
        </div>

        <div class="card__image">
            <img src="{{ $shop->shop_image }}" alt="">
            <input name="shop_image" type="hidden" value="{{ old('shop_image', $shop->shop_image) }}">
        </div>

        <div class="card__text">
            <p class="shop_area">{{ $shop->shop_area }}</p>
            <input name="shop_area" type="hidden" value="{{ old('shop_area', $shop->shop_area) }}">
            <p class="shop_genre">{{ $shop->shop_genre }}</p>
            <input name="shop_genre" type="hidden" value="{{ old('shop_genre', $shop->shop_genre) }}">
            <p class="shop_overview">{{ $shop->shop_overview }}</p>
            <input name="shop_overview" type="hidden" value="{{ old('shop_overview', $shop->shop_overview) }}">
        </div>
    </div>

    <div class="reservation-card">
        <div class="reservation__title">
            <h2 class="title">予約</h2>
        </div>
        <form class="reservation-form" action="/reservation" method="post">
            @csrf
            <input name="id" type="hidden" value="{{ old('id', $shop->id) }}">

            <div class="reservation-form__date">
                <input class="reservation-form__item" type="date" id="reservation_date" name="reservation_date" value="{{ old('reservation_date') }}" />
            </div>
            <div class="form__error">
                @error('reservation_date')
                    {{ $message }}
                @enderror
            </div>
            <div class="reservation-form__time">
                <input class="reservation-form__item" type="time" id="reservation_time" name="reservation_time" value="{{ old('reservation_time') }}" step="1800"/>
            </div>
            <div class="form__error">
                @error('reservation_time')
                    {{ $message }}
                @enderror
            </div>
            <div class="reservation-form__number">
                <select class="reservation-form__item-input" name="reservation_number">
                    <option value="" @if(null === (int)old('reservation_number')) selected @endif hidden>人数</option>
                    <option value="1" @if(1 === (int)old('reservation_number')) selected @endif>1人</option>
                    <option value="2" @if(2 === (int)old('reservation_number')) selected @endif>2人</option>
                    <option value="3" @if(3 === (int)old('reservation_number')) selected @endif>3人</option>
                    <option value="4" @if(4 === (int)old('reservation_number')) selected @endif>4人</option>
                    <option value="5" @if(5 === (int)old('reservation_number')) selected @endif>5人</option>
                    <option value="6" @if(6 === (int)old('reservation_number')) selected @endif>6人</option>
                </select>
            </div>
            <div class="form__error">
                @error('reservation_number')
                    {{ $message }}
                @enderror
            </div>
            <button class="reservation-form__button-submit">予約する</button>
        </form>
    </div>

@endsection