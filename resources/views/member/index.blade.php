@extends('layouts.niceadmin')

@section('content')

<div class="container">

    <div class="mb-4 text-center">
        <span class="badge bg-info text-dark p-3 border border-3 border-dark">
            <h5 class="m-0 fw-bold">Members List</h5>
        </span>
    </div>

    <div class="card-body">

        <a class="btn btn-success mb-3" href="{{ route('member.create') }}">+ New Member</a>

        <table class="table">
            <tr style="text-align:center">
                <th>No.</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
            <?php $index = ($members->currentPage() - 1) * $members->perPage() + 1; ?>
            @foreach($members as $member)
            <tr style="text-align:center; vertical-align:middle">
                <th>{{ $index++ }}</th>
                <td>{{ $member->name }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('member.show', $member->id) }}">Details</a>

                    <a class="btn btn-warning" href="{{ route('member.edit', $member->id) }}">Edit</a>

                    <form method="POST" action="{{ route('member.destroy', $member->id) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </table>

        {!! $members->links() !!}
    </div>
</div>

@endsection