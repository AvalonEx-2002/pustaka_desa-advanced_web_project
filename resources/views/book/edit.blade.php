@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-header mb-4">
        <h5>Editing Book :
            <strong> {{ $book->title }} </strong>
        </h5>
    </div>
    
    <div class="card-body">
        <form method="POST" action="{{ route('book.update', $book) }}">
            @csrf
            @method('PUT')

            <div class="form-floating mb-3">
                <input name="title" type="text" class="form-control" id="title" placeholder="Book Title" value="{{ $book->title }}">
                <label for="title">Book Title</label>
            </div>

            <div class="form-floating mb-3">
                <input name="author" type="text" class="form-control" id="author" placeholder="Author" value="{{ $book->author }}">
                <label for="author">Author</label>
            </div>

            <div class="form-floating mb-3">
                <input name="publisher" type="string" class="form-control" id="publisher" placeholder="Publisher Name" value="{{ $book->publisher }}">
                <label for="publisher">Publisher Name</label>
            </div>

            <div class="form-floating mb-3">
                <input name="publishYear" type="year" class="form-control" id="publishYear" placeholder="Publish Year" value="{{ $book->publishYear }}">
                <label for="publishYear">Publish Year</label>
            </div>

            <div class="form-floating mb-3">
                <input name="quantity" type="integer" class="form-control" id="quantity" placeholder="Quantity" value="{{ $book->quantity }}">
                <label for="quantity">Quantity</label>
            </div>

            <div class="form-floating mb-3">
                <select name="category_id" class="form-select" id="category_id">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $book->category_id ? 'selected' : '' }}>
                        {{ $category->categoryName }}
                    </option>
                    @endforeach
                </select>
                <label for="category_id">Category</label>
            </div>

            <button type="button" class="btn btn-secondary" onclick="history.back()">Back</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection