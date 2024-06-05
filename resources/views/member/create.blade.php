@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card-header" style="margin-bottom: 20px;">
        <h5>Creating New :
            <strong>Library Member</strong>
        </h5>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('member.store') }}">
            @csrf
            <div class="form-floating mb-3">
                <input name="name" type="text" class="form-control" id="name" placeholder="Member Name">
                <label for="name">Member Name</label>
            </div>

            <div class="form-floating mb-3">
                <input name="icNumber" type="string" class="form-control" id="icNumber" placeholder="IC Number">
                <label for="icNumber">IC Number</label>
            </div>

            <div class="form-floating mb-3">
                <input name="address" type="text" class="form-control" id="address" placeholder="Member Address">
                <label for="name">Home Address</label>
            </div>

            <div class="form-floating mb-3">
                <input name="phoneNumber" type="string" class="form-control" id="phoneNumber" placeholder="Phone Number">
                <label for="phoneNumber">Phone Number</label>
            </div>

            <button type="button" class="btn btn-secondary" onclick="history.back()">Back</button>
            <input type="submit" class="btn btn-primary" value="Submit">
        </form>
    </div>
</div>

@endsection