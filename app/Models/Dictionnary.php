<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\GlobalDocument;

class Dictionnary extends GlobalDocument
{
    //
    protected $fillable = ['price', 'title', 'image', 'idLibrary', 'documentType', 'language'];

    // public function add($request){

    //     $validate = $request->validated();
    //     $this->price = $validate['price'];
    //     $this->title = $validate['title'];
    //     $this->idLibrary = $validate['id-library'];
    //     $this->language = $validate['language'];
    //     // $this->image = $validate['image'];
    //     $this->documentType = $validate['document-type'];

    //     return $this;
    // }
}
