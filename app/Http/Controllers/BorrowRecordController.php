<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BorrowRecord;
use App\Models\Member;
use Illuminate\Http\Request;

class BorrowRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrowRecords = BorrowRecord::all();

        return view('borrowRecord.index', compact('borrowRecords'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::where('quantity', '>', 0)->get();
        $members = Member::all();

        return view('borrowRecord.create', compact('books', 'members'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Find the book and check if quantity is sufficient
        $book = Book::findOrFail($request->book_id);
        if ($book->quantity < 1) {
            return redirect()->back()->with('error', 'This book is not available for borrowing');
        }

        // Decrease the book's quantity
        $book->decrement('quantity');

        $newBorrowRecord = new BorrowRecord;
        $newBorrowRecord->book_id = $request->book_id;
        $newBorrowRecord->member_id = $request->member_id;
        $newBorrowRecord->borrowDate = $request->borrowDate;
        $newBorrowRecord->quantity = 1;

        $newBorrowRecord->save();

        return redirect()->route('borrowRecord.index')->with('success', 'Borrow record created successfully');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Validate the query to avoid empty searches
        if (empty($query)) {
            return redirect()->route('borrowRecord.search')->with('error', 'Search query cannot be empty');
        }

        // Search by Book ID or Member IC No
        $borrowRecords = BorrowRecord::whereHas('book', function ($q) use ($query) {
            $q->where('id', $query);
        })
            ->orWhereHas('member', function ($q) use ($query) {
                $q->where('icNumber', $query);
            })
            ->get();

        return view('borrowRecord.index', compact('borrowRecords'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BorrowRecord $borrowRecord)
    {
        $books = Book::all();
        $members = Member::all();

        return view('borrowRecord.edit', compact('borrowRecord', 'books', 'members'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BorrowRecord $borrowRecord)
    {
        // Check if returnDate is being set and it was previously null
        if ($request->filled('returnDate') && is_null($borrowRecord->returnDate)) {
            // Increment the book's quantity
            $borrowRecord->book->increment('quantity');
        }

        $borrowRecord->book_id = $request->book_id;
        $borrowRecord->member_id = $request->member_id;
        $borrowRecord->returnDate = $request->returnDate;
        $borrowRecord->quantity = 1;

        $borrowRecord->save();

        return redirect()->route('borrowRecord.index')->with('success', 'Borrow record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(BorrowRecord $borrowRecord)
    {
        // Retrieve the associated book
        $book = $borrowRecord->book;

        // Check if returnDate is not specified (i.e., book has not been returned)
        if (!$borrowRecord->returnDate) {
            // Redirect back with error message
            return redirect()->route('borrowRecord.index')->with('error', 'Cannot delete borrow record beacause book has not been returned');
        }

        // Increment the book quantity by 1
        $book->increment('quantity');

        // Delete the borrow record
        $borrowRecord->delete();

        return redirect()->route('borrowRecord.index')->with('success', 'Borrow record deleted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(BorrowRecord $borrowRecord)
    {
        return view('borrowRecord.show', compact('borrowRecord'));
    }
}
