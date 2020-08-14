<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = [
        'user_id',
        'book_id',
        'ratting'
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
