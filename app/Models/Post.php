<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Post extends Eloquent
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Comments(){
        return $this->hasMany(Comment::class);
    }
}
