<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowedBook extends Model
{
    protected $fillable = [
        'user_id',
        'status',
        'borrowed_at',
        'returned_at',
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function detailBorrowedBooks() 
    {
        return $this->hasMany(DetailBorrowedBook::class);
    }
}
