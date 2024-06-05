@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card-header" style="margin-bottom: 20px;">
        <h5>Creating New :
            <strong>Book Category</strong>
        </h5>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('category.store') }}">
            @csrf
            <div class="form-floating mb-3">
                <input name="categoryName" type="text" class="form-control" id="categoryName" placeholder="Category Name" required>
                <label for="categoryName">Category Name</label>
            </div>

            <div class="form-floating mb-3">
                <input name="description" type="string" class="form-control" id="description" placeholder="Description" required>
                <label for="description">Description</label>
            </div>

            <button type="button" class="btn btn-secondary" onclick="history.back()">Back</button>
            <input type="submit" class="btn btn-primary" value="Submit">
        </form>
    </div>
</div>

@endsection