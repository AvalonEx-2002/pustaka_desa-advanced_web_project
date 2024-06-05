@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-header mb-4">
        <h5>Editing Category :
            <strong> {{ $category->categoryName }} </strong>
        </h5>
    </div>
    
    <div class="card-body">
        <form method="POST" action="{{ route('category.update', $category) }}">
            @csrf
            @method('PUT')

            <div class="form-floating mb-3">
                <input name="categoryName" type="text" class="form-control" id="categoryName" placeholder="Name" value="{{ $category->categoryName }}">
                <label for="categoryName">Category Name</label>
            </div>

            <div class="form-floating mb-3">
                <input name="description" type="string" class="form-control" id="description" placeholder="Description" value="{{ $category->description }} ">
                <label for="description">Description</label>
            </div>

            <button type="button" class="btn btn-secondary" onclick="history.back()">Back</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection