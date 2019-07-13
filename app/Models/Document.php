<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class Document extends Model
{
    //
    protected $table = 'document';
    protected $primaryKey ='id';
    protected $fillable = ['price', 'title', 'image', 'idLibrary', 'documentType'];

    static function getAll(){
        if(self::all()){
            return self::all();
        }else{
            return 'No documents registered';
        }
    }

    public function getById($id){

    }
}
