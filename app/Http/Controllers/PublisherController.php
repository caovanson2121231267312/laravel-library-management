<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publisher;
use App\Http\Requests\PublisherRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Excel;
use App\Exports\PublishersExport;
use Maatwebsite\Excel\Concerns\FromCollection;

class PublisherController extends Controller
{
    public function index()
    {
        if (session('success_title')) {
            toast(session('success_title'), 'success');
        }

        $publishers = Publisher::latest()->get();

        return view('admin.publisher.index', compact('publishers'));
    }

    public function store(PublisherRequest $request)
    {
        Publisher::create($request->all());

        return redirect()->route('publishers.index')->withSuccessTitle(trans('request.success'));
    }

    public function update(Request $request)
    {
        try {
            $publisher = Publisher::findOrFail($request->id);
        } catch (ModelNotFoundException $exception) {

            return view('404');
        }

        $publisher->update($request->all());

        return redirect()->route('publishers.index')->withSuccessTitle(trans('request.success'));
    }

    public function destroy(Publisher $publisher)
    {
        $publisher->delete();

        return redirect()->route('publishers.index')->withSuccessTitle(trans('request.success'));
    }

    public function export()
    {
        return Excel::download(new PublishersExport, 'publishers.xlsx');
    }
}
