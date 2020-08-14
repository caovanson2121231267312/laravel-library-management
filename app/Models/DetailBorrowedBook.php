<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailBorrowedBook extends Model
{
    public function borrowedBook() 
    {
        return $this->belongsTo(BorrowedBook::class);
    }

    public function book() 
    {
        return $this->belongsTo(Book::class);
    }
}
