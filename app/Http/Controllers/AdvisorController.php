<?php

namespace App\Http\Controllers;

use App\Models\Advisor;
use App\Models\User;
use Illuminate\Http\Request;

class AdvisorController extends Controller
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
        $advisor = new Advisor();
        $advisor->names = $request->name;
        $advisor->first_lastname = $request->first_lastname;
        $advisor->second_lastname = $request->second_lastname;
        $advisor->dni = $request->dni;
        $advisor->program = $request->program;
        $advisor->user_id = $userId;
        $advisor->save();
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
        $advisor = Advisor::where('user_id', $user->id)->first();
        $advisor->names = $request->name;
        $advisor->first_lastname = $request->first_lastname;
        $advisor->second_lastname = $request->second_lastname;
        $advisor->dni = $request->dni;
        $advisor->program = $request->program;
        $advisor->save();

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
