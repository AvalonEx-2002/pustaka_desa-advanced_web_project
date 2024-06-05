@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-header mb-4">
        <h5>Editing Member :
            <strong> {{ $member->name }} </strong>
        </h5>
    </div>
    
    <div class="card-body">
        <form method="POST" action="{{ route('member.update', $member) }}">
            @csrf
            @method('PUT')

            <div class="form-floating mb-3">
                <input name="name" type="text" class="form-control" id="name" placeholder="Name" value="{{ $member->name }}">
                <label for="name">Name</label>
            </div>

            <div class="form-floating mb-3">
                <input name="icNumber" type="text" class="form-control" id="icNumber" placeholder="IC Number" value="{{ $member->icNumber }}">
                <label for="icNumber">IC Number</label>
            </div>

            <div class="form-floating mb-3">
                <input name="address" type="text" class="form-control" id="address" placeholder="Address" value="{{ $member->address }}">
                <label for="address">Address</label>
            </div>

            <div class="form-floating mb-3">
                <input name="phoneNumber" type="text" class="form-control" id="phoneNumber" placeholder="Phone Number" value="{{ $member->phoneNumber }}">
                <label for="phoneNumber">Phone Number</label>
            </div>

            <button type="button" class="btn btn-secondary" onclick="history.back()">Back</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
