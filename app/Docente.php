<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{

    protected $fillable = [
        'cedula',
        'titulo',
        'nombres',
        'correo',
        'telefono'
    ];
}
