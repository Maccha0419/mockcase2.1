@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop.css') }}">
<link href="{{ mix('css/like.css') }}" rel="stylesheet" type="text/css">
<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
@endsection

@section('content')
<div class="search__content">
    <div class="search-form__item">
        <form class="search-form" action="/research" method="get">
        @csrf
            <div class="search__before">
                <select class="search-form__item-select" name="shop_area">
                    <option value="">All area</option>
                    @foreach ($shop_areas as $shop_area)
                    <option value="{{ $shop_area->shop_area }}" @if(old('shop_area') == $shop_area->shop_area) selected @endif>{{ $shop_area->shop_area }}</option>
                    @endforeach
                </select>
            </div>
            <div class="search__after">
                <select class="search-form__item-select" name="shop_genre">
                    <option value="">All genre</option>
                    @foreach ($shop_genres as $shop_genre)
                    <option value="{{ $shop_genre->shop_genre}}" @if(old('shop_genre') == $shop_genre->shop_genre) selected @endif>{{ $shop_genre->shop_genre }}</option>
                    @endforeach
                </select>
            </div>
            <input class="search-form__item-input" type="text" name="keyword" placeholder="Search..." value="{{ old('keyword') }}">
        </form>
    </div>

    <div id="like" >
        <div class="shop-card">
            @foreach ($shops as $key => $shop)
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
@endsection