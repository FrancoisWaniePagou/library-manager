<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Document;

class GlobalDocument extends Document
{
    //
    public function getAll($idLibrary){
        return GlobalDocument::where('idLibrary', $idLibrary)->get();
    }
    public function getById($idDocument){
        return GlobalDocument::where('id', $idDocument)->get();
    }
}
