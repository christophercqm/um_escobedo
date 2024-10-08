<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acreditacion extends Model
{
    use HasFactory;

    protected $table = 'formulario_acreditacion'; // Reemplaza 'nombre_de_tu_tabla' con el nombre correcto


    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'correo',
        'telefono',
        'asunto',
        'archivo',
        'proximo_encuentro',
        'tipo_acreditacion',
        'partido_id' // Se relaciona con el id de la tabla del partido
    ];

    public function partido()
    {
        return $this->belongsTo(Partido::class);
    }
}