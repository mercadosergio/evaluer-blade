<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $submissionId)
    {
        $request->validate([
            'title' => 'required',
            'line' => 'required',
            'leader' => 'required',
            'description' => 'required',
        ]);
        Proposal::create([
            'title' => $request->title,
            'description' => $request->description,
            'line' => $request->line,
            'leader' => $request->leader,
            'advisor' => $request->advisor,
            'program' => $request->program,
            'semester' => $request->semester,
            'submission_id' => $submissionId,
        ]);
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
