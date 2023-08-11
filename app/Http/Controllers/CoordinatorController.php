<?php

namespace App\Http\Controllers;

use App\Models\Coordinator;
use App\Models\User;
use Illuminate\Http\Request;

class CoordinatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request, $userId)
    {
        $coordinator = new Coordinator();
        $coordinator->names = $request->name;
        $coordinator->first_lastname = $request->first_lastname;
        $coordinator->second_lastname = $request->second_lastname;
        $coordinator->dni = $request->dni;
        $coordinator->program = $request->program;
        $coordinator->user_id = $userId;
        $coordinator->save();
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

    public function update(Request $request, User $user)
    {
        $coordinator = Coordinator::where('user_id', $user->id)->first();
        $coordinator->names = $request->name;
        $coordinator->first_lastname = $request->first_lastname;
        $coordinator->second_lastname = $request->second_lastname;
        $coordinator->dni = $request->dni;
        $coordinator->program = $request->program;
        $coordinator->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
