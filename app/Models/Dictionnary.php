<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\GlobalDocument;

class Dictionnary extends GlobalDocument
{
    //
    protected $fillable = ['language'];

    public function add($request){

        $validate = $request->validated();
        return $validate;
    }
}
