<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UltimoPartido extends Model
{

    protected $table = 'ultimos_partidos';

    use HasFactory;

    protected $fillable = [
        'fecha',
        'puntuacion_local',
        'puntuacion_visitante',
        'estadio',
        'estado_partido',
        'resultado',
        'equipo_local_id',
        'equipo_visitante_id',
        'partido_id',
    ];

    // Relación con el equipo local
    public function equipoLocal()
    {
        return $this->belongsTo(Equipo::class, 'equipo_local_id');
    }

    // Relación con el equipo visitante
    public function equipoVisitante()
    {
        return $this->belongsTo(Equipo::class, 'equipo_visitante_id');
    }

    // Relación con el partido
    public function partido()
    {
        return $this->belongsTo(Partido::class, 'partido_id'); // Definir la relación
    }
}
