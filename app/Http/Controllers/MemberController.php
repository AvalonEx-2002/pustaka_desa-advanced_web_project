<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::paginate(10);

        return view('member.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('member.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newMember = new Member;
        $newMember->name = $request->name;
        $newMember->icNumber = $request->icNumber;
        $newMember->address = $request->address;
        $newMember->phoneNumber = $request->phoneNumber;

        $newMember->save();

        return redirect()->route('member.index')->with('success', 'Member record created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        // Load the borrow records with the associated books for the member
        $member->load('borrowRecords.book');

        return view('member.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('member.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $member->name = $request->name;
        $member->icNumber = $request->icNumber;
        $member->address = $request->address;
        $member->phoneNumber = $request->phoneNumber;

        $member->save();

        return redirect()->route('member.index')->with('success', 'Member record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        // Check if the member has any borrow records
        if ($member->borrowRecords()->exists()) {
            return redirect()->route('member.index')->with('error', 'Cannot delete the member because they have associated borrow records');
        }

        // If no borrow records, proceed to delete the member
        $member->delete();

        return redirect()->route('member.index')->with('success', 'Member record deleted successfully');
    }
}
