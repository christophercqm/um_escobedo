<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acreditacion extends Model
{
    use HasFactory;

    protected $table = 'formulario_acreditacion';

    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'correo',
        'telefono',
        'asunto',
        'archivo',
        'proximo_encuentro',
        'medio_al_que_pertenece',
        'club_pertenece',
        'tipo_acreditacion',
        'partido_id'
    ];

    public function partido()
    {
        return $this->belongsTo(Partido::class);
    }
}