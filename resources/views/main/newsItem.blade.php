<div class="row">
    <div class="col-md-8 mb-4">
        <h4>
            <a href="{{ route('news.show', ['id' => $newsItem->id]) }}">
                {{ $newsItem->title }}
            </a>
        </h4>
        <p>{{ $newsItem->text }}</p>
        <div>
            <span>
                Category: {{ $newsItem->category->title }}
            </span>
            <br>
            <span>
                Created: {{ $newsItem->created_at->format('Y-m-d') }}
            </span>
        </div>
    </div>
</div>
