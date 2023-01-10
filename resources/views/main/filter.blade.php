<form action=" {{ route('main') }} "
      method="GET"
      class="my-5"
>
    <div class="row">
        <div class="col-auto">
            <label for="filter-category" class="col-form-label">Filter by category:</label>
        </div>
        <div class="col-auto">
            <select id="filter-category"
                    class="form-control"
                    name="category"
                    onchange="this.form.submit()"
            >
                <option value="0">All</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                            @selected($category->id == $categorySelectedId)
                    >
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</form>
