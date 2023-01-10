@extends('layouts.app')
@section('title', 'Manager')
@section('header')
    <div class="row">
        <div class="col-md-12">
            <h1>Manager</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <a href="{{ route('manager.create') }}"
               class="btn btn-primary btn-sm my-5"
               type="button"
            >
                Create new
            </a>
        </div>
    </div>
@stop
@section('content')
    @each('manager.newsItem', $news, 'newsItem')
@stop
