<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prensa extends Model
{
    use HasFactory;

    // Definir los campos que son asignables en masa
    protected $fillable = [
        'imagen',            // Ruta de la imagen
        'titulo',            // Título de la noticia
        'descripcion_breve', // Descripción breve
        'descripcion',       // Descripción completa
    ];

}
