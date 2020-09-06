<?php

namespace App\Exports;

use App\Models\Author;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AuthorsExport implements FromView
{
    public function view(): View
    {
        return view('exports.authors', [
            'authors' => Author::all(),
        ]);
    }
}
