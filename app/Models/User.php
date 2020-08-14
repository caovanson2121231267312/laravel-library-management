<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 
        'email', 
        'password',
        'phone_number',
        'avatar',
        'role_id'
    ];

    protected $hidden = [
        'password', 
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role() 
    {
        return $this->belongsTo(Role::class);
    }

    public function borrowedBooks() 
    {
        return $this->hasMany(BorrowedBook::class);
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
