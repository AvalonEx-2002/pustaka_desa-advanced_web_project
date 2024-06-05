<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::paginate(10);

        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('book.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newBook = new Book;
        $newBook->title = $request->title;
        $newBook->author = $request->author;
        $newBook->publishYear = $request->publishYear;
        $newBook->publisher = $request->publisher;
        $newBook->quantity = $request->quantity;
        $newBook->category_id = $request->category_id;

        $newBook->save();

        return redirect()->route('book.index')->with('success', 'Book record created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = Category::all();

        return view('book.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $book->title = $request->title;
        $book->author = $request->author;
        $book->publishYear = $request->publishYear;
        $book->publisher = $request->publisher;
        $book->quantity = $request->quantity;
        $book->category_id = $request->category_id;

        $book->save();

        return redirect()->route('book.index')->with('success', 'Book record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        // Check if the book has any borrow records
        if ($book->borrowRecords()->exists()) {
            return redirect()->route('book.index')->with('error', 'Cannot delete the book because it has associated borrow records');
        }

        // If no borrow records, proceed to delete the book
        $book->delete();

        return redirect()->route('book.index')->with('success', 'Book record deleted successfully');
    }
}
