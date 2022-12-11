<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'creator',
        'name',
        'description',
        'bgColor',
    ];

    public function User()
    {
        return $this->hasOne(User::class);
    }

}
