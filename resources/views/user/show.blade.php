@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <span style="vertical-align:middle; font-weight:bold; font-size:large">User Information</span>
        </div>

        <div class="card-body">
            <div>
                <table class="table table-striped table-bordered border-dark table-hover">
                    <tr>
                        <td>
                            <strong>Full Name</strong>
                        </td>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Email Address</strong>
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Registration Date</strong>
                        </td>
                        <td>
                            {{ \Carbon\Carbon::parse($user->registrationDate)->format('d-m-Y') }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>User Category</strong>
                        </td>
                        <td>
                            {{ $user->userCategory }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Account Status</strong>
                        </td>
                        <td style="font-weight:bold; color: {{ $user->accountStatus == "Authorized" ? "green" : "red" }}">
                            {{ $user->accountStatus }}
                        </td>
                    </tr>
                </table>
            </div>

            <div>
                <button type="button" class="btn btn-secondary" onclick="history.back()">Back</button>

                @can('isAdmin')
                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                @endcan
            </div>
        </div>
    </div>
</div>

@endsection