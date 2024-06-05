@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-header mb-4">
        <h5>Editing User :
            <strong> {{ $user->name }} </strong>
        </h5>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('user.update', $user) }}">
            @csrf
            @method('PUT')

            <div class="form-floating mb-3">
                <input name="name" type="text" class="form-control" id="name" placeholder="Name" value="{{ $user->name }}">
                <label for="name">Name</label>
            </div>

            <div class="form-floating mb-3">
                <input name="email" type="email" class="form-control" id="email" placeholder="Email Address" value="{{ $user->email }} ">
                <label for="email">Email Address</label>
            </div>

            <div class="form-floating mb-3">
                <select name="accountStatus" class="form-select" id="accountStatus">
                    <option value="Authorized" {{ $user->accountStatus == 'Authorized' ? 'selected' : '' }}>Authorized</option>
                    <option value="Suspended" {{ $user->accountStatus == 'Suspended' ? 'selected' : '' }}>Suspended</option>
                </select>
                <label for="accountStatus">Account Status</label>
            </div>

            <div class="form-floating mb-3">
                <input name="password" type="password" class="form-control" id="password" placeholder="New Password">
                <label for="password">New Password</label>
            </div>

            <div class="form-floating mb-3">
                <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Confirm New Password">
                <label for="password_confirmation">Confirm New Password</label>
            </div>

            <button type="button" class="btn btn-secondary" onclick="history.back()">Back</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection