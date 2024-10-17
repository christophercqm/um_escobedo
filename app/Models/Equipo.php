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

    // Relación con los partidos donde el equipo fue local
    public function partidosComoLocal()
    {
        return $this->hasMany(UltimoPartido::class, 'equipo_local_id');
    }

    // Relación con los partidos donde el equipo fue visitante
    public function partidosComoVisitante()
    {
        return $this->hasMany(UltimoPartido::class, 'equipo_visitante_id');
    }
}
