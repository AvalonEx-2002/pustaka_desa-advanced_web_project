@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-header mb-4">
        <h5>Editing Borrow Record :
            <strong> ID {{ $borrowRecord->id }} </strong>
        </h5>
    </div>

    <form action="{{ route('borrowRecord.update', $borrowRecord->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="book_id" class="form-label">Book</label>
            <select class="form-select" id="book_id" name="book_id" required>
                <option value="" style="font-weight: bold">Select a book</option>
                @foreach($books as $book)
                <option value="{{ $book->id }}" {{ $borrowRecord->book_id == $book->id ? 'selected' : '' }}>{{ $book->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="member_id" class="form-label">Borrower</label>
            <select class="form-select" id="member_id" name="member_id" required>
                <option value="" style="font-weight: bold">Select a member</option>
                @foreach($members as $member)
                <option value="{{ $member->id }}" {{ $borrowRecord->member_id == $member->id ? 'selected' : '' }}>{{ $member->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="borrowDate" class="form-label">Borrow Date</label>
            <input type="date" class="form-control" id="borrowDate" name="borrowDate" value="{{ $borrowRecord->borrowDate }}" required>
        </div>
        <div class="mb-3">
            <label for="returnDate" class="form-label">Return Date</label>
            <input type="date" class="form-control" id="returnDate" name="returnDate" value="{{ $borrowRecord->returnDate ? $borrowRecord->returnDate : '' }}">
        </div>

        <button type="button" class="btn btn-secondary" onclick="history.back()">Back</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection