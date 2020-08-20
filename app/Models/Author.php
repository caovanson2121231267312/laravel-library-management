<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use SoftDeletes;

    protected $directory = '/images/';

    protected $fillable = [
        'name',
        'email',
        'description',
        'avatar',
    ];

    public function books() 
    {
        return $this->hasMany(Book::class);
    }

    public function getAvatarAttribute($value) 
    {
        return $this->directory . $value;
    }
}
