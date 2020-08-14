<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'number_of_pages',
        'number_of_available_books',
        'author_id',
        'publisher_id',
        'category_id',
    ];

    public function detailBorrowedBooks() 
    {
        return $this->hasMany(DetailBorrowedBook::class);
    }

    public function category() 
    {
        return $this->belongsTo(Category::class);
    }

    public function author() 
    {
        return $this->belongsTo(Author::class);
    }

    public function publisher() 
    {
        return $this->belongsTo(Publisher::class);
    }
    
    public function likes() 
    {
        return $this->hasMany(Like::class);
    }

    public function rates() 
    {
        return $this->hasMany(Rate::class);
    }

    public function comments() 
    {
        return $this->hasMany(Comment::class);
    }
}
