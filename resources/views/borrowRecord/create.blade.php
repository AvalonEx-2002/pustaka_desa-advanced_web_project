@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card-header" style="margin-bottom: 20px;">
        <h5>Creating New :
            <strong>Borrow Record</strong>
        </h5>
    </div>

    <form action="{{ route('borrowRecord.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="book_id" class="form-label">Book</label>
            <select class="form-select" id="book_id" name="book_id" required>
                <option value="" style="font-weight: bold;">Select a book</option>
                @foreach($books as $book)
                <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="member_id" class="form-label">Borrower</label>
            <select class="form-select" id="member_id" name="member_id" required>
                <option value="" style="font-weight: bold;">Select a member</option>
                @foreach($members as $member)
                <option value="{{ $member->id }}">{{ $member->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="borrowDate" class="form-label">Borrow Date</label>
            <input type="date" class="form-control" id="borrowDate" name="borrowDate" required>
        </div>

        <button type="button" class="btn btn-secondary mt-4" onclick="history.back()">Back</button>
        <button type="submit" class="btn btn-primary mt-4">Create</button>
    </form>
</div>
@endsection