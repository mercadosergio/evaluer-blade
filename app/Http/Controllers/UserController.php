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
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
        ], [
            'name.required' => 'El nombre del usuario es requerido',
            'email.required' => 'El email es requerido',
            'email.email' => 'El email es no tiene el formato correcto',
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
