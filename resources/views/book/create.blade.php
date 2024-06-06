@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card-header" style="margin-bottom: 20px;">
        <h5>Creating New :
            <strong>Book Entry</strong>
        </h5>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('book.store') }}">
            @csrf
            <div class="form-floating mb-3">
                <input name="title" type="string" class="form-control" id="title" placeholder="Book Title" required>
                <label for="title">Book Title</label>
            </div>

            <div class="form-floating mb-3">
                <input name="author" type="string" class="form-control" id="author" placeholder="Author Name" required>
                <label for="author">Author Name</label>
            </div>

            <div class="form-floating mb-3">
                <input name="publisher" type="string" class="form-control" id="publisher" placeholder="Publisher Name" required>
                <label for="publisher">Publisher Name</label>
            </div>

            <div class="form-floating mb-3">
                <input name="publishYear" type="number" class="form-control" id="publishYear" placeholder="Publish Year" min="1000" max="9999" required>
                <label for="publishYear">Publish Year</label>
            </div>

            <div class="form-floating mb-3">
                <input name="quantity" type="number" class="form-control" id="quantity" placeholder="Quantity" min="1" step="1" required>
                <label for="quantity">Quantity</label>
            </div>

            <div class="form-floating mb-3">
                <select name="category_id" class="form-select" id="category_id" required>
                    <option value="" style="font-weight: bold;">Select a book category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                    @endforeach
                </select>
                <label for="category_id">Category</label>
            </div>

            <button type="button" class="btn btn-secondary" onclick="history.back()">Back</button>
            <input type="submit" class="btn btn-primary" value="Submit">
        </form>
    </div>
</div>

@endsection