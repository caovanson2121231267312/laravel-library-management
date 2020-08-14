<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'book_id',
        'content',
    ];

    public function user() 
    {
        return $this->belongsTo(User::Class);
    }

    public function book() 
    {
        return $this->belongsTo(Book::Class);
    }
}
