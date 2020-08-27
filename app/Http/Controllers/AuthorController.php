<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Author;
use App\Models\Book;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        if ($user->role_id == config('const.admin')) {
            $authors = Author::latest()->paginate(config('const.five'));

            return view('admin.author.index', compact('authors'));
        } else {
            $authors = Author::latest()->paginate(config('book.textbook_category_id'));

            return view('author', compact('authors'));
        }
    }

    public function create()
    {
        return view('admin.author.add');
    }

    public function store(AuthorRequest $request)
    {
        $author = $request->all();

        if ($file = $request->file('avatar')){
            $name_image = $file->getClientOriginalName();
            $file->move('images', $name_image);
            $author['avatar'] = $name_image;
        }

        Author::create($author);

        return redirect()->route('authors.index');
    }

    public function edit($id)
    {
        try {
            $author = Author::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return view('404');
        }

        return view('admin.author.edit', compact('author'));
    }

    public function update(Request $request, $id)
    {
        try {
            $author = Author::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return view('404');
        }
        $dataUpdate = $request->all();

        if ($file = $request->file('avatar')){
            $name_image = $file->getClientOriginalName();
            $file->move('images', $name_image);
            $dataUpdate['avatar'] = $name_image;
        }

        $author->update($dataUpdate);

        return redirect()->route('authors.index');
    }

    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('authors.index');
    }

    public function detail($id)
    {
        try {
            $author = Author::with('books')->find($id);
        } catch (ModelNotFoundException $exception) {

            return view('404');
        }

        return view('auth_detail', compact('author'));
    }
}
