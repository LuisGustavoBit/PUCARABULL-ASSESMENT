<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assesment extends Model
{
   
    Protected $table ='assesment';
  protected $fillable = [
       'id' ,'nombre_usuario', 'comentario',


    ];
}
