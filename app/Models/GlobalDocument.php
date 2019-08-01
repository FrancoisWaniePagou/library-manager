<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Document;

class GlobalDocument extends Document
{
    //
    public function getAll($idLibrary){
        $globalDocument = GlobalDocument::where('idLibrary', $idLibrary)->get();
        return $globalDocument;
    }
    public function getById($idDocument){
        $globalDocument = GlobalDocument::where('id', $idDocument)->get();
    }

}
