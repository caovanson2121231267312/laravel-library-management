<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Category;
use App\Models\Author;
use App\Models\Publisher;
use App\Http\Requests\BookRequest;
use App\Components\Recusive;

class BookController extends Controller
{
    private $book;
    private $category;
    private $author;
    private $publisher;

    public function __construct(
        Book $book, 
        Category $category, 
        Author $author, 
        Publisher $publisher
    ) {
        $this->book = $book;
        $this->category = $category;
        $this->author = $author;
        $this->publisher = $publisher;
        $this->middleware('auth');
    } 

    public function index()
    {
        $user = Auth::user();

        if ($user->role_id == config('const.admin')) {
            $books = Book::latest()->paginate(config('const.five'));

            return view('admin.book.index', compact('books'));
        } else {
            $books = Book::latest()->paginate(config('book.number_of_new_books'));

            return view('book', compact('books'));
        }

    }

    public function create()
    {
        $categoryOption = $this->getCategory('');
        $authors = $this->author->all();
        $publishers = $this->publisher->all();

        return view('admin.book.add', compact(['categoryOption', 'authors', 'publishers']));
    }

    public function getCategory($parentId) {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $categoryOption = $recusive->categoryRecusive($parentId);

        return $categoryOption;
    }

    public function store(BookRequest $request)
    {
        $book = $request->all();

        if ($file = $request->file('image')) {
            $name_image = $file->getClientOriginalName();
            $file->move('images', $name_image);
            $book['image'] = $name_image;
        }

        Book::create($book);

        return redirect()->route('books.index');
    }

    public function edit($id)
    {
        try {
            $book = Book::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return view('404');
        }
        $categoryOption = $this->getCategory('');
        $authors = $this->author->all();
        $publishers = $this->publisher->all();

        return view('admin.book.edit', compact(['book', 'categoryOption', 'authors', 'publishers']));
    }

    public function update(Request $request, $id)
    {
        try {
            $book = Book::find($id);
        } catch (ModelNotFoundException $exception) {
            return view('404');
        }
        $dataUpdate = $request->all();

        if ($file = $request->file('image')) {
            $name_image = $file->getClientOriginalName();
            $file->move('images', $name_image);
            $dataUpdate['image'] = $name_image;
        }

        $book->update($dataUpdate);

        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
    }

    public function detail($id)
    {
        try {
            $book = Book::findOrFail($id);
        } catch (ModelNotFoundException $exception) {

            return view('404');
        }

        $relatedBooks = Book::inRandomOrder()
            ->where('category_id', $book->category_id)
            ->take((config('book.number_of_related_books')))
            ->get();

        return view('book_detail', compact(['book', 'relatedBooks']));
    }
}
