@extends('layouts.app')

@section('content')

<div class="container">

    <!-- JavaScript pop-up message -->
    @if(session('error'))
    <script>
        alert('{{ session('error') }}');
    </script>
    @endif

    @if(session('success'))
    <script>
        alert('{{ session('success') }}');
    </script>
    @endif

    <div class="mb-4 text-center">
        <span class="badge bg-info text-dark p-3 border border-3 border-dark">
            <h5 class="m-0 fw-bold">Borrow Records</h5>
        </span>
    </div>

    <!-- Button to Add New Record -->
    <div class="mb-4">
        <a href="{{ route('borrowRecord.create') }}" class="btn btn-success">+ New Borrow Record</a>
    </div>

    <!-- Search Form -->
    <form action="{{ route('borrowRecord.search') }}" method="GET" class="mb-4">
        @csrf
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Search by Book ID or Borrower's IC No." required>
            <div class="input-group-append" style="margin-left: 10px">
                <button class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    <!-- Display Borrowing Records -->
    @if($borrowRecords->isEmpty())
    <p>No borrowing records found</p>

    @else
    <table class="table">
        <thead>
            <tr style="text-align:center">
                <th>Book ID</th>
                <th>Title</th>
                <th>Borrower's Name</th>
                <th>IC No.</th>
                <th>Borrow Date</th>
                <th>Return Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrowRecords as $record)
            <tr style="text-align:center; vertical-align:middle">
                <th>{{ $record->book->id }}</th>
                <td>{{ $record->book->title }}</td>
                <td>{{ $record->member->name }}</td>
                <td>{{ $record->member->icNumber }}</td>
                <td>{{ \Carbon\Carbon::parse($record->borrowDate)->format('d-m-Y') }}</td>
                <td>{{ $record->returnDate ? \Carbon\Carbon::parse($record->returnDate)->format('d-m-Y') : 'Not Returned' }}</td>

                <th>
                    <a class="btn btn-warning" href="{{ route('borrowRecord.edit', $record->id) }}">Edit</a>

                    <form method="POST" action="{{ route('borrowRecord.destroy', $record->id) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                </th>
            </tr>
            @endforeach
        </tbody>
    </table>

    @endif

    <div>
        <button type="button" class="btn btn-secondary" onclick="history.back()">Back</button>
    </div>
</div>

@endsection