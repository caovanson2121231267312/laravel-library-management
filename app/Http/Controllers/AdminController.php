<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BorrowedBook;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $requests = BorrowedBook::latest()->take(config('const.new_request'))->get();

        $books = Book::latest()->take(config('const.new_book'))->get();

        return view('admin.home', compact(['requests', 'books']));
    }
}
