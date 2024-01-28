@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
<script src="{{ mix('js/confirm.js') }}" defer></script>
@endsection

@section('content')
<div class="content">
    <div class="shop-card">
        <div class="card__header">
            <div class="card__button">
                <form class="card__button" action="/" method="get">
                    @csrf
                    <button class="card__button-button"></button>
                </form>
            </div>
            <div class="card__name">
                <p class="shop_name">{{ $shop->shop_name }}</p>
                <input name="shop_name" type="hidden" value="{{ old('shop_name', $shop->shop_name) }}">
            </div>
        </div>
        <div class="card__inner">
            <div class="card__image">
                <img src="{{ $shop->shop_image }}" alt="">
                <input name="shop_image" type="hidden" value="{{ old('shop_image', $shop->shop_image) }}">
            </div>
            <div class="card__text">
                <div class="card__text-upper">
                    <p class="shop_area">#{{ $shop->shop_area }}</p>
                    <input name="shop_area" type="hidden" value="{{ old('shop_area', $shop->shop_area) }}">
                    <p class="shop_genre">#{{ $shop->shop_genre }}</p>
                    <input name="shop_genre" type="hidden" value="{{ old('shop_genre', $shop->shop_genre) }}">
                </div>
                <p class="shop_overview">{{ $shop->shop_overview }}</p>
                <input name="shop_overview" type="hidden" value="{{ old('shop_overview', $shop->shop_overview) }}">
            </div>
        </div>
    </div>
    <div class="reservation-card" id="confirm">
        <confirm-component
        :user-id="{{ json_encode($user->id) }}"
        :shop-id="{{ json_encode($shop->id) }}"
        :shop-name="{{ json_encode($shop->shop_name) }}"
        :old="{{ json_encode(Session::getOldInput()) }}"
        :errors= "{{ $errors }}"
        ></confirm-component>
    </div>
</div>
@endsection