@extends('layouts.niceadmin')

@section('content')

<div class="container">

    <div class="mb-4 text-center">
        <span class="badge bg-info text-dark p-3 border border-3 border-dark">
            <h5 class="m-0 fw-bold">Books List</h5>
        </span>
    </div>

    <div class="card-body">

        <a class="btn btn-success mb-3" href="{{ route('book.create') }}">+ New Book</a>

        <table class="table">
            <tr style="text-align:center">
                <th>Book ID</th>
                <th>Book Title</th>
                <th>Available</th>
                <th>Action</th>
            </tr>

            @foreach($books as $book)
            <tr style="text-align:center; vertical-align:middle">
                <th>{{ $book->id }}</th>
                <td>{{ $book->title }}</td>
                <td><span style="font-weight:bold; color: {{ $book->quantity > 0 ? 'green' : 'red' }}">
                {{ $book->quantity > 0 ? $book->quantity : "Not Available" }}</span></td>
                <th>
                    <a class="btn btn-primary" href="{{ route('book.show', $book->id) }}">Details</a>

                    <a class="btn btn-warning" href="{{ route('book.edit', $book->id) }}">Edit</a>

                    <form method="POST" action="{{ route('book.destroy', $book->id) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </th>
            </tr>
            @endforeach
        </table>

        {!! $books->links() !!}
    </div>
</div>

@endsection