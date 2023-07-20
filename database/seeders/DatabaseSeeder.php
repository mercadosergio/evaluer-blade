<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ActivityType;
use App\Models\Admin;
use App\Models\Advisor;
use App\Models\Course;
use App\Models\CoursesStudent;
use App\Models\InvestigationLine;
use App\Models\Program;
use App\Models\Role;
use App\Models\Student;
use App\Models\StudentsTeam;
use App\Models\Team;
use App\Models\User;
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
        ]);
        Role::create([
            'id' => 2,
            'role_name' => 'Asesor',
            'status' => 1,
        ]);
        Role::create([
            'id' => 3,
            'role_name' => 'Coordinador',
            'status' => 1,
        ]);
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
            'program_id' => 1,
            'created_at' => '2023-07-02 18:31:32',
        ]);
        InvestigationLine::create([
            'id' => 2,
            'line' => 'ANÁLISIS, DISEÑO, DESARROLLO E IMPLEMENTACIÓN DE APLICACIONES MÓVILES',
            'objectives' => 'Implementar Aplicaciones Móviles que brinden solución a las necesidades de los usuarios.',
            'subline' => 'Aplicaciones móviles Nativas',
            'program_id' => 1,
            'created_at' => '2023-07-02 18:31:32',
        ]);
        InvestigationLine::create([
            'id' => 3,
            'line' => 'ANÁLISIS, DISEÑO, DESARROLLO E IMPLEMENTACIÓN DE SOFTWARE WEB',
            'objectives' => 'Brindar soluciones informáticas, destinadas a automatizar procesos mediante software a la medida.',
            'subline' => 'Análisis, diseño y desarrollo de aplicaciones Web',
            'program_id' => 1,
            'created_at' => '2023-07-02 18:31:32',
        ]);

        ActivityType::create([
            'id' => 1,
            'typename' => 'Propuesta',
        ]);
        ActivityType::create([
            'id' => 2,
            'typename' => 'Anteproyecto',
        ]);
        ActivityType::create([
            'id' => 3,
            'typename' => 'Entregable de proyecto',
        ]);

        User::create([
            'id' => 1,
            'email' => 'jose@mail.com',
            'username' => '0987654321',
            'password' => bcrypt('0987654321'),
            'name' => 'Jose',
            'avatar' => 'default.png',
            'status' => 1,
            'role_id' => 1,
        ]);
        User::create([
            'id' => 2,
            'email' => 'maria@mail.com',
            'username' => '2222222222',
            'password' => bcrypt('2222222222'),
            'name' => 'Maria',
            'avatar' => 'default.png',
            'status' => 1,
            'role_id' => 1,
        ]);
        User::create([
            'id' => 3,
            'email' => 'marcos@mail.com',
            'username' => '1234567891',
            'password' => bcrypt('1234567891'),
            'name' => 'Marcos',
            'avatar' => 'default.png',
            'status' => 1,
            'role_id' => 2,
        ]);
        User::create([
            'id' => 4,
            'email' => 'juan@mail.com',
            'username' => '1234567890',
            'password' => bcrypt('1234567890'),
            'name' => 'Juan',
            'avatar' => 'default.png',
            'status' => 1,
            'role_id' => 4,
        ]);

        Admin::create([
            'id' => 1,
            'names' => 'Juan',
            'first_lastname' => 'Hernandez',
            'second_lastname' => 'Avila',
            'dni' => '1234567890',
            'user_id' => 4,
        ]);
        Student::create([
            'id' => 1,
            'names' => 'Jose',
            'first_lastname' => 'Fernandez',
            'second_lastname' => 'Contreras',
            'dni' => '1234567891',
            'program_id' => 1,
            'semester' => 8,
            'user_id' => 1,
        ]);
        Student::create([
            'id' => 2,
            'names' => 'Maria',
            'first_lastname' => 'Velez',
            'second_lastname' => 'Paez',
            'dni' => '2222222222',
            'program_id' => 1,
            'semester' => 8,
            'user_id' => 1,
        ]);

        Advisor::create([
            'id' => 1,
            'names' => 'Marcos',
            'first_lastname' => 'Gomez',
            'second_lastname' => 'Martinez',
            'dni' => '1234567891',
            'program_id' => 1,
            'user_id' => 3,
        ]);

        Course::create([
            'id' => 1,
            'subject' => 'Seminario de grado 1',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia, felis ut molestie euismod, lacus dui sollicitudin sem, eget fringilla lacus arcu ut purus. In in aliquam arcu. Nullam scelerisque varius luctus. Aliquam erat volutpat. Suspendisse nisl libero, feugiat eu ligula nec, ultricies aliquet eros. Donec non diam pretium, finibus quam eu, efficitur ante. Nunc malesuada eget ante at iaculis. Sed scelerisque mi faucibus nisl maximus, at luctus nisi laoreet. Sed a ornare velit. Donec a purus nunc. Ut eu odio eget libero condimentum ultricies in vel ligula.',
            'program' => 'INGENIERÍA INFORMÁTICA',
            'semester' => 8,
            'advisor_id' => 1,
        ]);

        CoursesStudent::create([
            'id' => 1,
            'student_id' => 1,
            'course_id' => 1,
        ]);

        Team::create([
            'id' => 1,
            'program' => 'INGENIERÍA INFORMÁTICA',
            'semester' => 8,
            'n_members' => 1,
            'period' => '2023-1',
            'course_id' => 1,
        ]);

        StudentsTeam::create([
            'id' => 1,
            'student_id' => 1,
            'team_id' => 1,
            'full_name' => 'Jose Fernandez',
        ]);
    }
}
