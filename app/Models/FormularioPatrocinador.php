<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormularioPatrocinador extends Model
{
    use HasFactory;

    // Especificar la tabla si su nombre no es plural del modelo
    protected $table = 'formulario_patrocinadores';

    // Los campos que se pueden asignar masivamente
    protected $fillable = [
        'empresa',
        'nombre_representante',
        'email',
        'telefono',
        'mensaje',
        'privacidad_aceptada',
    ];

}
