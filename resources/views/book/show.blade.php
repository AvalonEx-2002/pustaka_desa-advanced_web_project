@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <span style="vertical-align:middle; font-weight:bold; font-size:large">Book Information</span>
        </div>

        <div class="card-body">
            <div>
                <table class="table table-striped table-bordered border-dark table-hover">
                    <tr>
                        <td>
                            <strong>Title</strong>
                        </td>
                        <td>
                            {{ $book->title }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Author</strong>
                        </td>
                        <td>
                            {{ $book->author }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Publisher</strong>
                        </td>
                        <td>
                            {{ $book->publisher }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Publication Year</strong>
                        </td>
                        <td>
                            {{ $book->publishYear }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Quantity</strong>
                        </td>
                        <td>
                            {{ $book->quantity }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Book Category</strong>
                        </td>
                        <td>
                            {{ $book->category->categoryName }}
                        </td>
                    </tr>
                </table>
            </div>

            <div>
                <button type="button" class="btn btn-secondary" onclick="history.back()">Back</button>
                <a href="{{ route('book.edit', $book->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
</div>

@endsection