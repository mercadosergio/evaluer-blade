<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $submission = Submission::create([
            'progress_status_id' => 1,
            'team_id' => $request->team_id,
            'activity_id' => $request->activity_id,
        ]);

        switch ($request->activity_id) {
            case 1:
                $proposal = new ProposalController();
                $proposal->store($request, $submission->id);
                break;
            case 2:
                break;
            case 3:
                break;
        }
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
