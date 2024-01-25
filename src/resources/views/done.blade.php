@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/done.css') }}">
@endsection

@section('content')
<div class="done__content">
    <form class="form" action="/" method="get">
        @csrf
        <div class="text">
            <p class="text-content">ご予約ありがとうございます</p>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">戻る</button>
        </div>
    </form>
</div>
@endsection