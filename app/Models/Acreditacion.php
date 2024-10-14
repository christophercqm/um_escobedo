<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


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
        'carnet_federacion',
        'club_pertenece',
        'tipo_acreditacion',
        'partido_id',
        'privacidad',
        'token',
        'expires_at',
    ];

    public function partido()
    {
        return $this->belongsTo(Partido::class);
    }

    /**
     * Genera un token único para la acreditación.
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->token = Str::uuid(); // Genera un UUID único
            $model->expires_at = now()->addDays(5); //el token expira en 5 días
        });
    }
}