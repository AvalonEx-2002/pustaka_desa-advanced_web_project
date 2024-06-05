@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <span style="vertical-align:middle; font-weight:bold; font-size:large">Member Information</span>
        </div>

        <div class="card-body">
            <div>
                <table class="table table-striped table-bordered border-dark table-hover">
                    <tr>
                        <td>
                            <strong>Member Name</strong>
                        </td>
                        <td>
                            {{ $member->name }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>IC Number</strong>
                        </td>
                        <td>
                            {{ $member->icNumber }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Address</strong>
                        </td>
                        <td>
                            {{ $member->address }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Phone Number</strong>
                        </td>
                        <td>
                            {{ $member->phoneNumber }}
                        </td>
                    </tr>
                </table>
            </div>

            <div>
                <a href="{{ route('member.edit', $member->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            <span style="vertical-align:middle; font-weight:bold; font-size:large">Borrow Records</span>
        </div>

        <div class="card-body">
            <div>
                @if($member->borrowRecords->isEmpty())
                <p>No borrow records found</p>
                @else
                <table class="table table-striped table-bordered border-dark table-hover">
                    <thead>
                        <tr>
                            <th>Book Title</th>
                            <th>Borrow Date</th>
                            <th>Return Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($member->borrowRecords as $record)
                        <tr>
                            <td>{{ $record->book->title }}</td>
                            <td>{{ \Carbon\Carbon::parse($record->borrowDate)->format('d-m-Y') }}</td>
                            <td>{{ $record->returnDate ? \Carbon\Carbon::parse($record->returnDate)->format('d-m-Y') : 'Not Returned' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>

    <div class="mt-4">
        <button type="button" class="btn btn-secondary" onclick="history.back()">Back</button>
    </div>
</div>

@endsection