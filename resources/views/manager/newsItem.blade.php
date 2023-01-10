<div class="row">
    <div class="col-md-8 mb-4">
        <h4> {{ $newsItem->title }} </h4>
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
    <div class="col-md-3">
        <form action="{{ route('manager.edit', ['id' => $newsItem->id]) }}"
              method="GET"
        >
            <button type="submit" class="btn btn-warning btn-sm my-2 col-md-3">Edit</button>
        </form>
        <form action="{{ route('manager.delete', ['id' => $newsItem->id]) }}"
              method="POST"
              onsubmit="if (!confirm('Are you sure?')) {return false}"
        >
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger btn-sm my-2 col-md-3">Delete</button>
        </form>
    </div>
</div>
