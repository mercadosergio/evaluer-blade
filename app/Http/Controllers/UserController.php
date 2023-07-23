<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use App\Models\Dean;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(Request $request)
    {
        $request->validate([
            'role_id' => 'required',
            'dni' => 'required|size:10',
            'name' => 'required',
            'first_lastname' => 'required',
            'second_lastname' => 'required',
            'program' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|min:10',
        ], [
            'role_id.required' => 'El rol de usuario es requerido.',
            'dni.required' => 'El DNI es requerido.',
            'dni.size' => 'El DNI debe tener exactamente 10 caracteres.',
            'name.required' => 'El nombre es requerido.',
            'first_lastname.required' => 'El primer apellido es requerido.',
            'second_lastname.required' => 'El segundo apellido es requerido.',
            'program.required' => 'El programa académico es requerido.',
            'email.required' => 'El email es requerido.',
            'email.email' => 'El email no tiene el formato correcto.',
            'email.unique' => 'Hay una cuenta registrada con este email en el sistema.',
            'phone.required' => 'El número de teléfono es requerido.',
            'phone.min' => 'El número de teléfono debe tener al menos 10 digitos.',
        ]);

        $user = User::create([
            'role_id' => $request->role_id,
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->dni,
            'password' => bcrypt($request->dni),
            'avatar' => 'default.png'
        ]);

        if ($request->role_id == 1) {
            Student::create([
                'names' => $request->name,
                'first_lastname' => $request->first_lastname,
                'second_lastname' => $request->second_lastname,
                'dni' => $request->dni,
                'program' => $request->program,
                'semester' => 5,
                'user_id' => $user->id,

            ]);
        } elseif ($request->role_id == 2) {
            Advisor::create([
                'names' => $request->name,
                'first_lastname' => $request->first_lastname,
                'second_lastname' => $request->second_lastname,
                'dni' => $request->dni,
                'program' => $request->program,
                'user_id' => $user->id,
            ]);
        } elseif ($request->role_id == 3) {
            Dean::create([
                'names' => $request->name,
                'first_lastname' => $request->first_lastname,
                'second_lastname' => $request->second_lastname,
                'dni' => $request->dni,
                'program' => $request->program,
                'user_id' => $user->id,
            ]);
        }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
