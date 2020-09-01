<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailBorrowedBook extends Model
{
    protected $fillable = [
        'borrowed_book_id',
        'book_id',
    ];

    public $timestamps = false;

    public function borrowedBook() 
    {
        return $this->belongsTo(BorrowedBook::class);
    }

    public function book() 
    {
        return $this->belongsTo(Book::class);
    }
}
