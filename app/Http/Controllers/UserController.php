<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Check if user is authorized to create User records
        if (!Gate::allows('isAdmin')) {
            return redirect()->route('user.index')->with('error', 'You are not allowed to create user accounts');
        }

        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newUser = new User;
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->userLevel = $request->userLevel;
        $newUser->userCategory = $request->userCategory;
        $newUser->accountStatus = 'Authorized';
        $newUser->registrationDate = $request->registrationDate;
        $newUser->password = bcrypt('secret123');

        $newUser->save();

        return redirect()->route('user.index')->with('success', 'User record created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // Check if user is authorized to edit User records
        if (!Gate::allows('isAdmin') && !Gate::allows('manageOwnAccount', $user)) {
            return redirect()->route('user.index')->with('error', 'You are not allowed to edit other account details');
        }

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Check if user is an Admin and is not editing own account
        if (Gate::allows('isAdmin') && Gate::denies('manageOwnAccount', $user)) {
            $user->accountStatus = $request->input('accountStatus');
        }

        // Update password if provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return redirect()->route('user.index')->with('success', 'User record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Check if user is authorized to delete User records
        if (!Gate::allows('isAdmin')) {
            return redirect()->route('user.index')->with('error', 'You are not authorized to delete other accounts');
        }

        // Prevent the user from deleting themselves
        if (auth()->user()->id === $user->id) {
            return redirect()->route('user.index')->with('error', 'You cannot delete your own account');
        }

        $user->delete();

        return redirect()->route('user.index')->with('success', 'User record deleted successfully');
    }
}
