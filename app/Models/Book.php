<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = [
        'title',
        'description',
        'cover',
        'year',
        'author',
        'author_image',
        'pages',
        'price',
    ];
    protected $guarded = [
        'id',
    ];
}
