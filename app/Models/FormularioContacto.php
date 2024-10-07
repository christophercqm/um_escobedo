<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormularioContacto extends Model
{
    use HasFactory;

    protected $table = 'formulario_contactar'; 

    protected $fillable = [
        'tipo',
        'nombre',
        'apellidos',
        'email',
        'telefono',
        'mensaje',
        'privacidad_aceptada',
    ];

}
