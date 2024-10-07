<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    // Definir la tabla si no es plural de manera automática
    protected $table = 'equipos';

    // Definir los atributos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'ciudad',
        'pais',
        'logo',
    ];

    // Aquí puedes agregar métodos adicionales relacionados con el modelo si es necesario
}
