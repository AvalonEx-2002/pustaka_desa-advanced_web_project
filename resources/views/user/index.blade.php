@extends('layouts.niceadmin')

@section('content')

<div class="container">
    <div class="mb-4 text-center">
        <span class="badge bg-info text-dark p-3 border border-3 border-dark">
            <h5 class="m-0 fw-bold">Users List</h5>
        </span>
    </div>

    <div class="card-body">

        @can('isAdmin')
        <a class="btn btn-success mb-3" href="{{ route('user.create') }}">+ New User</a>
        @endcan

        <table class="table">
            <tr style="text-align:center">
                <th>No.</th>
                <th>Name</th>
                <th>Account Status</th>
                <th>Action</th>
            </tr>

            <?php $index = ($users->currentPage() - 1) * $users->perPage() + 1; ?>

            @foreach($users as $user)
            <tr style="text-align:center; vertical-align:middle">
                <th>{{ $index++ }}</th>
                <td>{{ $user->name }}</td>
                <td style="font-weight: bold; color: @php echo $user->accountStatus == 'Suspended' ? 'red' : 'green;' @endphp">
                    {{ $user->accountStatus }}
                </td>

                <th>
                    <a class="btn btn-primary" href="{{ route('user.show', $user->id) }}">Details</a>

                    @can('isAdmin')
                    <a class="btn btn-warning" href="{{ route('user.edit', $user->id) }}">Edit</a>
                    @elsecan('manageOwnAccount', $user)
                    <a class="btn btn-warning" href="{{ route('user.edit', $user->id) }}">Edit</a>
                    @endcan

                    @can('isAdmin')
                    <form method="POST" action="{{ route('user.destroy', $user->id) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    @endcan

                </th>
            </tr>
            @endforeach
        </table>

        {!! $users->links() !!}
    </div>
</div>

@endsection