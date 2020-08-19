<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::latest()->paginate(config('const.five'));

        return view('admin.author.index', compact('authors'));
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
}
