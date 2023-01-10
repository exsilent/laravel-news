@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="news-more">
            <h1> {{ $newsItem->title }} </h1>
            <p> {{ $newsItem->text }} </p>
            <p>
                Category:
                <span class="badge text-bg-light">
                    {{ $newsItem->category->title }}
                </span>
            </p>
            <p>
                Created: {{ $newsItem->created_at->format('Y-m-d H:i:s') }}
            </p>
            <a href="{{ route('main') }}"
               class="btn btn-sm btn-secondary col-md-1"
               role="button"
            >
                Back
            </a>
        </div>
    </div>
@stop
