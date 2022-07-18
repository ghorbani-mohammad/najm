<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Maghale;
use App\Models\Project;
use App\Models\ProjectFiles;
use App\Models\ProjectReport;
use App\Models\ProjectReports;
use App\Models\Publication;
use App\MyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function view(Project $project)
    {
        $fields = Project::getAllFields($project->type);
        $types = Project::getAllTypes();
        $project->load(['reports', 'files']);
        return view('projects.update-project-form')->with([
            'project' => $project,
            'fields' => $fields,
            'types' => $types,
        ]);
    }

    public function delete(Project $project)
    {
        $project->delete();
        return redirect()->back();
    }

    public function update(Project $project, Request $request)
    {
        $data = MyRequest::all($request);
        foreach ($data['info'] as $key => $field) {
            $project->$key = $field;
        }
        $project->save();

        if ($request->file('file.gharardad') ?? false) {
            $project->gharardad_link = $project->storeFile($request->file('file.gharardad'), 'project_gharardad');
            $project->save();
        }

        return redirect()->back();
    }

    public function add()
    {
        $fields = Project::getAllFields();
        $types = Project::getAllTypes();

        return view('projects.add-project-form')->with([
            'fields' => $fields,
            'types' => $types,
        ]);
    }

    public function postAdd(Request $request)
    {
        $data = MyRequest::all($request);
        $project = new Project($data['info']);
        $project->save();

        if ($request->file('file.gharardad') ?? false) {
            $project->gharardad_link = $project->storeFile($request->file('file.gharardad'), 'project_gharardad');
            $project->save();
        }

        return redirect()->route('project.view', ['project' => $project->id]);
    }

    public function all($type = null)
    {
        if ($type != null) {
            $projects = Project::where('type', $type)->get();
        } else {
            $projects = Project::all();
        }
        $finished = $projects->whereNotNull('end_date')->count();
        $unfinished = count($projects) - $finished;

        return view('projects.all-projects-list')->with([
            'projects' => $projects,
            'finished' => $finished,
            'unfinished' => $unfinished,
        ]);
    }

    public function addReport(Request $request, Project $project)
    {
        $data = MyRequest::get($request, 'addReports');
        $file = new ProjectReports();
        $file->file = $project->storeFile($request->file('addReports.file'), 'project_report_files');
        $file->title = $data['title'];
        $file->date = $data['date'];
        $file->project_id = $project->id;
        $file->save();

        return redirect()->back();
    }

    public function deleteReport(ProjectReports $report)
    {
        $report->delete();

        return redirect()->back();
    }

    public function downloadReport(ProjectReports $report)
    {
        return Storage::disk('files')->download($report->file);
    }

    public function downloadGharardad(Project $project)
    {
        if ($project->gharardad_link) {
            return Storage::disk('files')->download($project->gharardad_link);
        }

        return redirect()->back();
    }

    public function getAllEvaluations(Project $project)
    {
        $project->load(['evaluations']);
        $stats = Evaluation::getstat($project->evaluations);
        $stats['project'] = $project;

        return view('projects.all-evaluations')->with($stats);
    }

    public function getEvaluation(Evaluation $evaluation)
    {
        return view('projects.update-evaluation')->with([
            'evaluation' => $evaluation,
        ]);
    }

    public function addEvaluation(Request $request, Project $project)
    {
        $evaluation = new Evaluation();
        foreach ($request->get('addEvaluation') as $key => $value) {
            $evaluation->$key = $value;
        }
        $evaluation->project_id = $project->id;
        $evaluation->save();

        if ($request->file('addEvaluationFile.file')) {
            $evaluation->link = $evaluation->storeFile($request->file('addEvaluationFile.file'));
            $evaluation->save();
        }

        return redirect()->back();
    }

    public function deleteEvaluation(Evaluation $evaluation)
    {
        $evaluation->delete();

        return redirect()->back();
    }

    public function downloadEvaluation(Evaluation $evaluation)
    {
        return Storage::disk('files')->download($evaluation->link);
    }

    public function postViewEvaluation(Request $request, Evaluation $evaluation)
    {
        foreach ($request->get('addEvaluation') as $key => $value) {
            $evaluation->$key = $value;
        }
        $evaluation->save();

        if ($request->file('addEvaluationFile.file')) {
            $evaluation->link = $evaluation->storeFile($request->file('addEvaluationFile.file'));
            $evaluation->save();
        }

        return redirect()->back();
    }

    public function addMadarek(Request $request, Project $project)
    {
        $file = new ProjectFiles();
        $file->link = $project->storeFile($request->file('addFiles.file'));
        $file->name = $request->file('addFiles.file')->getClientOriginalName();
        $file->project_id = $project->id;
        $file->save();

        return redirect()->back();
    }

    public function deleteMadarek(ProjectFiles $file)
    {
        $file->delete();

        return redirect()->back();
    }

    public function downloadMadarek(ProjectFiles $file)
    {
        return Storage::disk('files')->download($file->file);
    }
}
