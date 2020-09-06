<?php

namespace App\Exports;

use App\Models\Publisher;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PublishersExport implements FromView
{
    public function view(): View
    {
        return view('exports.publishers', [
            'publishers' => Publisher::all(),
        ]);
    }
}
