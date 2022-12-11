<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Comment extends Eloquent
{
    use HasFactory;
    public function Post(){
        return $this->belongsTo(Post::class);
    }
    public function User(){
        return $this->belongsTo(User::class);
    }
}
