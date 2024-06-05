@extends('layouts.niceadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome') }}</div>

                <div class="card-body" style="padding-top: 10px;">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in to the system !') }}
                </div>

                <!-- Button to go to various pages -->

                <!--
                <div class="card-footer">
                    <a href="{{ route('user.index') }}" class="btn btn-primary">Go to User Index</a>
                </div>
                <div class="card-footer">
                    <a href="{{ route('category.index') }}" class="btn btn-secondary">Go to Category Index</a>
                </div>
                <div class="card-footer">
                    <a href="{{ route('member.index') }}" class="btn btn-info">Go to Member Index</a>
                </div>
                <div class="card-footer">
                    <a href="{{ route('book.index') }}" class="btn btn-dark">Go to Book Index</a>
                </div>
                <div class="card-footer">
                    <a href="{{ route('borrowRecord.index') }}" class="btn btn-warning">Go to Borrow Record Index</a>
                </div>
-->
            </div>
        </div>
    </div>
</div>
@endsection