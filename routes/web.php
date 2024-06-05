<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowRecordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('niceadmin_welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', function () {
    // Check if the user is authenticated
    if (Auth::check()) {
        // Check if the user's account is authorized using the gate
        if (Gate::allows('accountIsAuthorized', Auth::user())) {
            return view('home');
        } else {
            Auth::logout(); // Log out the user
            return redirect()->route('login')->with('error', 'Your account is currently suspended. Please contact the Administrator');
        }
    } else {
        return redirect()->route('login')->with('error', 'Please log in to access this page');
    }
})->name('home');

Route::resource('user', UserController::class)->middleware('can:isAdminOrVolunteer');

Route::resource('category', CategoryController::class)->middleware('can:isAdminOrVolunteer');

Route::resource('member', MemberController::class)->middleware('can:isAdminOrVolunteer');

Route::resource('book', BookController::class)->middleware('can:isAdminOrVolunteer');

Route::get('/borrowRecord/search', [BorrowRecordController::class, 'search'])->name('borrowRecord.search')->middleware('can:isAdminOrVolunteer');

Route::resource('borrowRecord', BorrowRecordController::class)->middleware('can:isAdminOrVolunteer');