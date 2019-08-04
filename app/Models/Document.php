<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class Document extends Model
{
    //
    protected $table = 'document';
    protected $primaryKey ='id';

    abstract public function getAll($idLibrary);
    abstract public function getById($idDocument);
}
