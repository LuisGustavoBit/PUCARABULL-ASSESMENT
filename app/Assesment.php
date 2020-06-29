<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assesment extends Model
{
   
    Protected $table ='assesment';
  protected $fillable = [
        'nombre_usuario', 'comentario',


    ];
}
