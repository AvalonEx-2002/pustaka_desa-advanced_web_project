@extends('layouts.niceadmin')

@section('content')

<div class="container">

    <div class="mb-4 text-center">
        <span class="badge bg-info text-dark p-3 border border-3 border-dark">
            <h5 class="m-0 fw-bold">Book Categories</h5>
        </span>
    </div>
    
    <div class="card-body">

        <a class="btn btn-success mb-3" href="{{ route('category.create') }}">+ New Category</a>

        <table class="table">
            <tr style="text-align:center">
                <th>No.</th>
                <th>Category Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            <?php $index = 1 ?>
            @foreach($categories as $category)
            <tr style="text-align:center; vertical-align:middle">
                <th>{{ $index++ }}</th>
                <td>{{ $category->categoryName }}</td>
                <td style="max-width: 600px; text-align:justify">{{ $category->description }}</td>
                <th>
                    <a class="btn btn-warning" href="{{ route('category.edit', $category->id) }}">Edit</a>

                    <form method="POST" action="{{ route('category.destroy', $category->id) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </th>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection