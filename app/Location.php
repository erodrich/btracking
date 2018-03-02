<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    protected $table = 'locations';
    protected $fillable = ['mac','fecha','hora','latitud','longitud'];
    protected $guarded = ['id'];
}
