<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Publisher\PublisherRepositoryInterface;
use App\Http\Requests\PublisherRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Excel;
use App\Exports\PublishersExport;
use Maatwebsite\Excel\Concerns\FromCollection;

class PublisherController extends Controller
{
    protected $publisherRepo;

    public function __construct(PublisherRepositoryInterface $publisherRepo)
    {
        $this->publisherRepo = $publisherRepo;
    }

    public function index()
    {
        if (session('success_title')) {
            toast(session('success_title'), 'success');
        }

        $publishers = $this->publisherRepo->getPublisher();

        return view('admin.publisher.index', compact('publishers'));
    }

    public function store(PublisherRequest $request)
    {
        $this->publisherRepo->create($request->all());

        return redirect()->route('publishers.index')->withSuccessTitle(trans('request.success'));
    }

    public function update(Request $request)
    {
        try {
            $publisher = $this->publisherRepo->find($request->id);
        } catch (ModelNotFoundException $exception) {

            return view('404');
        }

        $publisher->update($request->all());

        return redirect()->route('publishers.index')->withSuccessTitle(trans('request.success'));
    }

    public function destroy($id)
    {
        try {
            $publisher = $this->publisherRepo->find($id);
        } catch (ModelNotFoundException $exception) {

            return view('404');
        }

        $publisher->delete();

        return redirect()->route('publishers.index')->withSuccessTitle(trans('request.success'));
    }

    public function export()
    {
        return Excel::download(new PublishersExport, 'publishers.xlsx');
    }
}
