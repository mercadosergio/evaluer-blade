<?php

namespace App\Http\Controllers;

use App\Models\ResearchProject;
use Illuminate\Http\Request;

class ResearchProjectController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }

    public function store(Request $request, $submissionId)
    {
        $request->validate([
            'pdf_file' => 'required',
        ]);

        $year = date('Y');
        $month = date('n');
        $half = ($month <= 6) ? '1' : '2';
        $period = $year . '-' . $half;

        $file = $request->file('pdf_file');
        $originalName = $file->getClientOriginalName();
        $newFileName = strtolower(str_replace(' ', '-', $originalName));
        $modifiedFileName = date("d-m-y") . "-" . date("H-m-s") . "-" . $newFileName;

        $directory = storage_path('app/public/files/proyectos_investigación/' . $period);

        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }

        $file->storeAs('public/files/proyectos_investigación/' . $period, $modifiedFileName);
        ResearchProject::create([
            'filename' => $newFileName,
            'submission_id' => $submissionId,
            'path' => 'storage/files/proyectos_investigación/' . $period . '/' . $modifiedFileName,
        ]);
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

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
