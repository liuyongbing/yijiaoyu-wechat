@extends('layouts.main')

@section('title', '领取会员卡')

@section('content')
<section class="loading page">
    <span class="icon icon_close"></span>
    <div class="card">
        <div class="logo"></div>
        <div class="text">
            <a href="{{ route('students.create') }}">
                <span class="left"></span>
                <span class="center"></span>
                <span class="right"></span>
            </a>
        </div>
    </div>
</section>
@endsection