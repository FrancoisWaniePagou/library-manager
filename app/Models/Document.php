<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class Document extends Model
{
    //
    protected $table = 'document';
    protected $primaryKey ='id';
    protected $fillable = ['price', 'title', 'image', 'idLibrary', 'documentType'];
}
