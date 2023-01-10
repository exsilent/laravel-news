@extends('layouts.app')

@php
    $isEdit = !empty($newsItem);
    $title = $isEdit ? 'News edit' : 'News create';
@endphp

@section('title', $title)

@section('header')
    <div class="row">
        <div class="col-md-12">
            <h1>{{ $title }}</h1>
        </div>
    </div>
@stop

@section('content')
    <form action="
            @if ($isEdit) {{ route('manager.update', ['id' => $newsItem->id]) }}
            @else {{ route('manager.store') }}
            @endif"
          method="POST"
    >
        @csrf
        @if ($isEdit)
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="news-title" class="form-label">
                Title
            </label>
            <input type="text"
                   name="title"
                   class="form-control @error('title') is-invalid @enderror"
                   id="news-title"
                   placeholder="Enter news title"
                   required
                   @isset($newsItem)
                       value="{{ $newsItem->title }}"
                   @endisset
            >
            <div class="invalid-feedback">
                @error('title') {{ $message }} @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="news-text" class="form-label">Text</label>
            <textarea class="form-control @error('text') is-invalid @enderror"
                      id="news-text"
                      name="text"
                      placeholder="Enter news text"
                      required
                      rows="3"
            >@isset($newsItem){{$newsItem->text}}@endisset</textarea>
            <div class="invalid-feedback">
                @error('text') {{ $message }} @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="news-category" class="form-label">Category</label>
            <select class="form-control @error('category_id') is-invalid @enderror"
                    id="news-category"
                    name="category_id"
            >
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                            @selected($isEdit && $category->id == $newsItem->category->id)
                    >
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                @error('category_id') {{ $message }} @enderror
            </div>
        </div>
        <div class="mb-3">
            @isset($newsItem)
                <span>Created: {{ $newsItem->created_at }}</span>
                <br>
                <span>Updated: {{ $newsItem->updated_at }}</span>
            @endisset

        </div>
        <div class="my-5">
            <a href="{{ route('manager.index') }}"
               type="button"
               class="btn btn-secondary btn-sm me-3"
            >
                Return
            </a>
            @if ($isEdit)
                <button type="submit" class="btn btn-warning btn-sm me-3">Update</button>
            @else
                <button type="submit" class="btn btn-primary btn-sm me-3">Create</button>
            @endif
        </div>
    </form>
@stop
