@extends('layouts.app')
@section('title', 'News')
@section('header')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('main') }}">
                <h1>News</h1>
            </a>
        </div>
    </div>
    @include('main.filter')
@stop
@section('content')
    @each('main.newsItem', $news, 'newsItem')
@stop
