<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UltimoPartido extends Model
{

    protected $table = 'ultimos_partidos';

    // Campos que se pueden llenar
    protected $fillable = [
        'partido_id',
        'puntuacion_local',
        'puntuacion_visitante',
        'estadio',
        'estado_partido',
    ];

    // Relación con Partido
    public function partido()
    {
        return $this->belongsTo(Partido::class, 'partido_id');
    }
}
