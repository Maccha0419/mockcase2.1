@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="header__inner">
    <div class="header-utilities">
        <nav>
            <ul class="header-nav">
                @if (!(Auth::user() && Auth::user()->hasVerifiedEmail()))
                <li class="header-nav__item">
                    <a class="header-nav__link" href="/">Home</a>
                </li>
                <li class="header-nav__item">
                    <form class="form" action="/register" method="get">
                        @csrf
                        <button class="header-nav__button">Registration</button>
                    </form>
                </li>
                <li class="header-nav__item">
                    <form class="form" action="/login" method="get">
                        @csrf
                        <button class="header-nav__button">Login</button>
                    </form>
                </li>
                @endif
                @if (Auth::user() && Auth::user()->hasVerifiedEmail())
                <li class="header-nav__item">
                    <a class="header-nav__link" href="/">Home</a>
                </li>
                <li class="header-nav__item">
                    <form class="form" action="/logout" method="post">
                        <button class="header-nav__button">Logout</button>
                    </form>
                </li>
                <li class="header-nav__item">
                    <a class="header-nav__link" href="/mypage">Mypage</a>
                </li>
                <li class="header-nav__item">
                    <form class="form" action="/logout" method="post">
                        @csrf
                        <button class="header-nav__button">ログアウト</button>
                    </form>
                </li>
                @endif
            </ul>
        </nav>
    </div>
</div>
@endsection