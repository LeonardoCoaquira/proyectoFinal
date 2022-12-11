<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Comment extends Eloquent
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'post_id',
        'user_id',
    ];
    
    public function Post(){
        return $this->belongsTo(Post::class);
    }
    public function User(){
        return $this->belongsTo(User::class);
    }
}
