<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    // allowing our model to accept an array from 
    // If the field is not in this list/array, the database will reject it.
    protected $fillable = ['title', 'content']; 

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
