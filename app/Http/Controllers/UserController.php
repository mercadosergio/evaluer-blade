<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
    }

    public function create()
    {
        //
    }

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

        $user = new User();
        $user->role_id = $request->role_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->dni;
        $user->password = bcrypt($request->dni);
        $user->profile_photo_path = 'default.png';
        $user->save();

        if ($request->role_id == 1) {
            $student = new StudentController();
            $student->store($request, $user);
            return $student ? redirect()->back()->with('success', 'Usuario registrado con éxito') : redirect()->back()->with('error', 'Ocurrió un error al registrar el usuario');
        } elseif ($request->role_id == 2) {
            $advisor = new AdvisorController();
            $advisor->store($request, $user);
            return $advisor ? redirect()->back()->with('success', 'Usuario registrado con éxito') : redirect()->back()->with('error', 'Ocurrió un error al registrar el usuario');
        } elseif ($request->role_id == 3) {
            $coordinator = new CoordinatorController();
            $coordinator->store($request, $user);
            return $coordinator ? redirect()->back()->with('success', 'Usuario registrado con éxito') : redirect()->back()->with('error', 'Ocurrió un error al registrar el usuario');
        }
        return back();
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'dni' => 'required|size:10',
            'name' => 'required',
            'first_lastname' => 'required',
            'second_lastname' => 'required',
            'program' => 'required',
            'email' => 'required|email|unique:users',
        ], [
            'dni.required' => 'El DNI es requerido.',
            'dni.size' => 'El DNI debe tener exactamente 10 caracteres.',
            'name.required' => 'El nombre es requerido.',
            'first_lastname.required' => 'El primer apellido es requerido.',
            'second_lastname.required' => 'El segundo apellido es requerido.',
            'program.required' => 'El programa académico es requerido.',
            'email.required' => 'El email es requerido.',
            'email.email' => 'El email no tiene el formato correcto.',
            'email.unique' => 'Hay una cuenta registrada con este email en el sistema.',
        ]);

        switch ($request->role_id) {
            case 1:
                $student = new StudentController();
                $student->update($request, $user);
                return $student ? redirect()->back()->with('success', 'Se actualizó el usuario') : redirect()->back()->with('error', 'Ocurrió un error al modificar la información');
                break;
            case 2:
                $advisor = new AdvisorController();
                $advisor->update($request, $user);
                return $advisor ? redirect()->back()->with('success', 'Se actualizó el usuario') : redirect()->back()->with('error', 'Ocurrió un error al modificar la información');
                break;
            case 3:
                $coordinator = new CoordinatorController();
                $coordinator->update($request, $user);
                return $coordinator ? redirect()->back()->with('success', 'Se actualizó el usuario') : redirect()->back()->with('error', 'Ocurrió un error al modificar la información');
                break;
        }
    }

    public function destroy(string $id)
    {
        //
    }
}
