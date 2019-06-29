<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    //
    protected $table = 'library';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'owner', 'phoneNumber', 'city', 'quarter'];
}
