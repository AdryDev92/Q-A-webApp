<div class="category">
    @foreach($question->category->pluck('name')->toArray() as $category)
        <span class="badge badge-info">{{ $category }}</span>
    @endforeach
</div>