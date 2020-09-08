<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Author\AuthorRepositoryInterface;
use App\Models\Book;
use App\Http\Requests\AuthorRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Excel;
use App\Exports\AuthorsExport;
use Maatwebsite\Excel\Concerns\FromCollection;

class AuthorController extends Controller
{
    protected $authorRepo;

    public function __construct(AuthorRepositoryInterface $authorRepo)
    {
        $this->middleware('auth');
        $this->authorRepo = $authorRepo;
    }

    public function index()
    {
        $user = Auth::user();

        if ($user->role_id == config('const.admin')) {
            if (session('success_title')) {
                toast(session('success_title'), 'success');
            }

            $authors = $this->authorRepo->getAuthorAdmin();

            return view('admin.author.index', compact('authors'));
        } else {
            $authors = $this->authorRepo->getAuthorUser();

            return view('author', compact('authors'));
        }
    }

    public function store(AuthorRequest $request)
    {
        $author = $request->all();

        if ($file = $request->file('avatar')){
            $name_image = $file->getClientOriginalName();
            $file->move('images', $name_image);
            $author['avatar'] = $name_image;
        }

        $this->authorRepo->create($author);

        return redirect()->route('authors.index')->withSuccessTitle(trans('request.success'));
    }

    public function update(Request $request)
    {
        try {
            $author = $this->authorRepo->find($request->id);
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

        return redirect()->route('authors.index')->withSuccessTitle(trans('request.success'));
    }

    public function destroy($id)
    {
        try {
            $author = $this->authorRepo->find($id);
        } catch (ModelNotFoundException $exception) {

            return view('404');
        }

        $author->delete();

        return redirect()->route('authors.index')->withSuccessTitle(trans('request.success'));
    }

    public function detail($id)
    {
        try {
            $author = $this->authorRepo->find($id);
        } catch (ModelNotFoundException $exception) {

            return view('404');
        }

        return view('auth_detail', compact('author'));
    }

    public function export()
    {
        return Excel::download(new AuthorsExport, 'authors.xlsx');
    }
}
