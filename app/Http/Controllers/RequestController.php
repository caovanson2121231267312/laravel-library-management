<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\BorrowedBook;
use App\Models\DetailBorrowedBook;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class RequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (session('success_title')) {
            toast(session('success_title'), 'success');
        }

        if (session('error_title')) {
            toast(session('error_title'), 'error');
        }

        $formRequests = BorrowedBook::latest()->paginate(config('const.five'));

        return view('admin.request_book_management', compact('formRequests'));      
    }

    public function indexUser($id)
    {
        if (session('success_title')) {
            toast(session('success_title'), 'success');
        }

        $user = Auth::user();

        $formRequests = BorrowedBook::where('user_id', Auth::id())
            ->latest()
            ->paginate(config('const.five'));
            
        $borrowingBooks = collect([]);
        $formApproves = BorrowedBook::with('detailBorrowedBooks')
            ->where([
                ['user_id', Auth::id()],
                ['status', config('request.approve')],
            ])
            ->get();

        foreach ($formApproves as $formApprove) {
            foreach ($formApprove->detailBorrowedBooks as $book) {
                $bookCheck = Book::find($book['book_id']);
                $borrowingBooks->push($bookCheck);
            }
        }

        return view('request', compact(['user', 'formRequests', 'borrowingBooks']));
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
        
        return redirect()->route('user.index', Auth::id())->withSuccessTitle(trans('request.success'));
    }

    public function destroy($id)
    {
        try {
            $formRequest = BorrowedBook::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return view('404');
        }
        
        $formRequest->delete();

        return redirect()->route('user.index', Auth::id())->withSuccessTitle(trans('request.success'));
    }

    public function check($id)
    {
        try {
            $check = BorrowedBook::with('detailBorrowedBooks')->find($id);
        } catch (ModelNotFoundException $exception) {
            return view('404');
        }

        $start = Carbon::parse($check['borrowed_at']);
        $end = Carbon::parse($check['returned_at']);
        $time = $start->diffInDays($end);

        $approveRequests = BorrowedBook::withCount('detailBorrowedBooks')
            ->where([
                ['user_id', $check['user_id']],
                ['status', config('request.approve')],
            ])
            ->orWhere([
                ['user_id', $check['user_id']],
                ['status', config('request.pending')],
            ])
            ->get();
        $count = config('const.zero');
        foreach ($approveRequests as $approveRequest) {
            $count += $approveRequest->detailBorrowedBooks->count();
        }

        $checkAvailableBook = true;
        foreach ($check->detailBorrowedBooks as $book) {
            try {
                $bookCheck = Book::find($book['book_id']);
            } catch (ModelNotFoundException $exception) {
    
                return view('404');
            }

            if ($bookCheck['number_of_available_books'] > config('const.zero')) {
                $checkAvailableBook = true;
            } else {
                $checkAvailableBook = false;
                break;
            }
        }

        if ($time <= config('request.date') && $count <= config('request.max') && $checkAvailableBook == true) {
            $check['status'] = config('request.approve');

            $check->update();

            foreach ($check->detailBorrowedBooks as $book) {
                try {
                    $bookUpdate = Book::find($book['book_id']);
                } catch (ModelNotFoundException $exception) {
        
                    return view('404');
                }
    
                $bookUpdate['number_of_available_books'] = $bookUpdate['number_of_available_books'] - config('const.one');
    
                $bookUpdate->update();
            }

            return redirect()->route('admin.request')->withSuccessTitle(trans('request.ok'));
        } else {
            $check['status'] = config('request.reject');

            $check->update();

            return redirect()->route('admin.request')->withErrorTitle(trans('request.not_ok'));
        }
    }
}
