<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use App\Models\Job;
use App\Models\Personnel;
use App\MyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    public function addJob(Request $request, Personnel $person)
    {
        $data = MyRequest::all($request);
        $job = new Job();
        foreach ($data['addJob'] ?? [] as $field => $value) {
            $job->$field = $value;
        }
        if ($data['addJobFiles']['file'] ?? false){
            $job->link = $person->storeFile($data['addJobFiles']['file'], 'job_documents');
        }

        $job->person_id = $person->id;
        $job->save();

        return redirect()->back();
    }

    public function deleteJob(Job $job)
    {
        $job->delete();

        return redirect()->back();
    }

    public function downloadJob(Job $job)
    {
        return Storage::disk('files')->download($job->link);
    }
}
