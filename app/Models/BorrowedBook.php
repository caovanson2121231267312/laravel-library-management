<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BorrowedBook extends Model
{
    use SoftDeletes;

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
