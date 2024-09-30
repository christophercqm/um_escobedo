<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugadores extends Model
{
    use HasFactory;

    protected $table = 'jugadores';

    protected $fillable = [
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'altura',
        'posicion',
        'numero_camiseta',
        'peso',
        'equipo',
        'nacionalidad',
        'estado',
        'foto_url', 
    ];
}
