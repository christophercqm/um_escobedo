<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormularioContacto extends Model
{
    use HasFactory;

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'apellidos',
        'email',
        'telefono',
        'mensaje',
        'privacidad_aceptada',
        'tipo',
    ];

    // Opcional: Definir los casts si es necesario
    protected $casts = [
        'privacidad_aceptada' => 'boolean',
    ];

    // Opcional: Métodos adicionales (ej. relaciones, scopes, etc.)
}
