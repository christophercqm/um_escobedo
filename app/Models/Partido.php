<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;

    protected $table = 'partidos';

    // Campos que se pueden llenar
    protected $fillable = [
        'equipo_local_id',
        'equipo_visitante_id',
        'fecha_hora',
        'resultado_local',
        'resultado_visitante',
        'estado',
        'estadio',

    ];

    // Definición de las relaciones
    public function equipoLocal()
    {
        return $this->belongsTo(Equipo::class, 'equipo_local_id');
    }

    public function equipoVisitante()
    {
        return $this->belongsTo(Equipo::class, 'equipo_visitante_id');
    }

    public function ultimosPartidos()
    {
        return $this->hasMany(UltimoPartido::class, 'partido_id');
    }
}
