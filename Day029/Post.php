<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // allowing our model to accept an array from 
    // If the field is not in this list/array, the database will reject it.
    protected $fillable = ['title', 'content']; 
}
