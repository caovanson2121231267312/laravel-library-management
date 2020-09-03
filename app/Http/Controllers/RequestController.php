<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BorrowedBook;
use App\Models\DetailBorrowedBook;
use Carbon\Carbon;

class RequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $formRequests = BorrowedBook::latest()->paginate(config('const.five'));
        
        return view('request', compact(['user', 'formRequests']));
    }

    public function store(Request $request)
    {          
        $dataForm = [
            'user_id' => Auth::id(),
            'status' => config('request.pending'),
            'borrowed_at' => Carbon::parse($request->borrowed_at),
            'returned_at' => Carbon::parse($request->returned_at),
        ];

        $dataFormId = BorrowedBook::create($dataForm);

        $listBookId = explode(',', $request->book_id);

        foreach ($listBookId as $bookId) {
            $dataBook = [
                'borrowed_book_id' => $dataFormId['id'],
                'book_id' => $bookId,
            ];

            DetailBorrowedBook::create($dataBook);
        }
        
        return redirect()->route('requests.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        try {
            $formRequest = BorrowedBook::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return view('404');
        }
        
        $formRequest->delete();

        return redirect()->route('requests.index');
    }
}
