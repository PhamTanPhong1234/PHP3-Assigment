@extends("Admin.layouts.layouts")
@section('content')
<!-- resources/views/news/edit.blade.php -->
<form action="{{ route('news.update', $news->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}" required>
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" id="editor" class="form-control">{{ $news->content }}</textarea>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" id="image" name="image">
        @if($news->image)
        <img src="{{ asset('images/'.$news->image) }}" alt="Current Image" style="max-width: 100px;">
        @endif
    </div>
    <div class="form-group">
        <label for="category_id">Category</label>
        <input type="number" class="form-control" id="category_id" name="category_id" value="{{ $news->category_id }}" required>
    </div>
    <div class="form-group">
        <label for="author_id">Author</label>
        <input type="number" class="form-control" id="author_id" name="author_id" value="{{ $news->author_id }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection