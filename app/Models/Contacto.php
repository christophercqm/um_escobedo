<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;

    protected $table = 'formularios_contacto';


    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'tipo',
        'nombre',
        'apellidos',
        'empresa', // Si aplica
        'nombre_representante', // Si aplica
        'telefono',
        'email',
        'mensaje',
        'asunto', // Si aplica
        'privacidad_aceptada',
    ];
}
