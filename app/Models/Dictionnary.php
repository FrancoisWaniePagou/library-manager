<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\GlobalDocument;

class Dictionnary extends GlobalDocument
{
    //
    protected $fillable = ['price', 'title', 'image', 'idLibrary', 'numberOfPage', 'documentType', 'language'];

}
