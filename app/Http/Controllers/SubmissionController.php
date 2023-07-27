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

        switch ($request->type_activity_id) {
            case 1:
                $proposal = new ProposalController();
                $isProposal = $proposal->store($request, $submission->id);
                return $isProposal ? redirect()->route('student.activity', ['id' => $request->activity_id])->with('success', 'Propuesta enviada con éxito') : back()->with('error', 'Ocurrió un error al entregar la actividad');
                break;
            case 2:
                $draft = new DraftController();
                $isDraft = $draft->store($request, $submission->id);
                return $isDraft ? redirect()->route('student.activity', ['id' => $request->activity_id])->with('success', 'Entregable enviado con éxito') : back()->with('error', 'Ocurrió un error al entregar la actividad');
                break;
            case 3:
                $project = new ResearchProjectController();
                $isProject = $project->store($request, $submission->id);
                return $isProject ? redirect()->route('student.activity', ['id' => $request->activity_id])->with('success', 'Entregable enviado con éxito') : back()->with('error', 'Ocurrió un error al entregar la actividad');
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
