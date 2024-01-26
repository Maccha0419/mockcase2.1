@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register__content">
    <div class="card">
        <div class="register-form__heading">
            <h2 class="register-form__heading-text">Regisration</h2>
        </div>
        <form class="form" action="/register" method="post">
            @csrf
            <div class="form__group">
                <div class="form__group-content">
                    <div class="form__input--name">
                        <input type="text" name="name" placeholder="Username" value="{{ old('name') }}" />
                    </div>
                </div>
                <div class="form__error">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-content">
                    <div class="form__input--email">
                        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" />
                    </div>
                </div>
                <div class="form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-content">
                    <div class="form__input--password">
                        <input type="password" placeholder="Password" name="password" />
                    </div>
                </div>
                <div class="form__error">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">登録</button>
            </div>
        </form>
    </div>
</div>
@endsection