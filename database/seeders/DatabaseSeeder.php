<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\InvestigationLine;
use App\Models\Program;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create([
            'id' => 1,
            'role_name' => 'Estudiante',
            'status' => 1,
        ],);
        Role::create([
            'id' => 2,
            'role_name' => 'Asesor',
            'status' => 1,
        ],);
        Role::create(
            [
                'id' => 3,
                'role_name' => 'Coordinador',
                'status' => 1,
            ],
        );
        Role::create([
            'id' => 4,
            'role_name' => 'Administrador',
            'status' => 1,
        ]);

        Program::create([
            'id' => 1,
            'name' => 'INGENIERÍA INFORMÁTICA',
            'snies_code' => '109334',
            'duration' => 9,
            'mode' => 'Presencial',
            'status' => 1,
        ]);
        Program::create([
            'id' => 2,
            'name' => 'CONTADURÍA PÚBLICA',
            'snies_code' => '103461',
            'duration' => 9,
            'mode' => 'Presencial',
            'status' => 1,
        ]);
        Program::create([
            'id' => 3,
            'name' => 'COCINA INTERNACIONAL',
            'snies_code' => '',
            'duration' => 3,
            'mode' => 'Presencial',
            'status' => 1,
        ]);
        Program::create([
            'id' => 4,
            'name' => 'DECORACIÓN DE INTERIORES',
            'snies_code' => '',
            'duration' => 6,
            'mode' => 'Presencial',
            'status' => 1
        ]);

        InvestigationLine::create([
            'id' => 1,
            'line' => 'ANÁLISIS, DISEÑO, DESARROLLO E IMPLEMENTACIÓN DE APLICACIONES MÓVILES',
            'objectives' => 'Implementar Aplicaciones Móviles que brinden solución a las necesidades de los usuarios.',
            'subline' => 'Aplicaciones móviles hibridas',
            'program' => 'INGENIERIA INFORMATICA',
            'created_at' => '2023-07-02 18:31:32',
        ]);
        InvestigationLine::create([
            'id' => 2,
            'line' => 'ANÁLISIS, DISEÑO, DESARROLLO E IMPLEMENTACIÓN DE APLICACIONES MÓVILES',
            'objectives' => 'Implementar Aplicaciones Móviles que brinden solución a las necesidades de los usuarios.',
            'subline' => 'Aplicaciones móviles Nativas',
            'program' => 'INGENIERIA INFORMATICA',
            'created_at' => '2023-07-02 18:31:32',
        ]);
        InvestigationLine::create([
            'id' => 3,
            'line' => 'ANÁLISIS, DISEÑO, DESARROLLO E IMPLEMENTACIÓN DE SOFTWARE WEB',
            'objectives' => 'Brindar soluciones informáticas, destinadas a automatizar procesos mediante software a la medida.',
            'subline' => 'Análisis, diseño y desarrollo de aplicaciones Web',
            'program' => 'INGENIERÍA INFORMÁTICA',
            'created_at' => '2023-07-02 18:31:32',
        ]);
    }
}
