<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publisher;
use App\Http\Requests\PublisherRequest;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::latest()->paginate(config('const.five'));

        return view('admin.publisher.index', compact('publishers'));
    }

    public function create()
    {
        return view('admin.publisher.add');
    }

    public function store(PublisherRequest $request)
    {
        Publisher::create($request->all());

        return redirect()->route('publishers.index');
    }

    public function edit($id)
    {
        $publisher = Publisher::find($id);

        return view('admin.publisher.edit', compact('publisher'));
    }

    public function update(Request $request, $id)
    {
        $publisher = Publisher::find($id);
        $publisher->update($request->all());

        return redirect()->route('publishers.index');
    }

    public function destroy(Publisher $publisher)
    {
        $publisher->delete();

        return redirect()->route('publishers.index');
    }
}
