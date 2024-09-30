<?php

namespace Database\Seeders;

use App\Models\Jugadores; // Asegúrate de tener el modelo correcto
use Illuminate\Database\Seeder;

class JugadoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Array de jugadores de prueba
        $jugadores = [
            [
                'nombre' => 'Lionel',
                'apellido' => 'Messi',
                'fecha_nacimiento' => '1987-06-24',
                'altura' => 1.70,
                'posicion' => 'Delantero',
                'numero_camiseta' => 10,
                'peso' => 72,
                'equipo' => 'Inter Miami',
                'nacionalidad' => 'Argentina',
                'estado' => 'Activo',
                'foto_url' => 'https://example.com/messi.jpg', // Cambia a una URL real
            ],
            [
                'nombre' => 'Cristiano',
                'apellido' => 'Ronaldo',
                'fecha_nacimiento' => '1985-02-05',
                'altura' => 1.87,
                'posicion' => 'Delantero',
                'numero_camiseta' => 7,
                'peso' => 83,
                'equipo' => 'Al Nassr',
                'nacionalidad' => 'Portugal',
                'estado' => 'Activo',
                'foto_url' => 'https://example.com/ronaldo.jpg', // Cambia a una URL real
            ],
            [
                'nombre' => 'Neymar',
                'apellido' => 'Jr',
                'fecha_nacimiento' => '1992-02-05',
                'altura' => 1.75,
                'posicion' => 'Delantero',
                'numero_camiseta' => 11,
                'peso' => 68,
                'equipo' => 'Al Hilal',
                'nacionalidad' => 'Brasil',
                'estado' => 'Activo',
                'foto_url' => 'https://example.com/neymar.jpg', // Cambia a una URL real
            ],
        ];

        // Crear los jugadores en la base de datos
        foreach ($jugadores as $jugador) {
            Jugadores::create($jugador);
        }
    }
}
