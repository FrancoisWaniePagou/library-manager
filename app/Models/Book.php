<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Document
{
    //
    protected $fillable = ['author', 'isbn', 'numberOfPage'];
}
