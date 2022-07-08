<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\MizLanguage;
use App\Models\MizSession;
use App\Models\Project;
use App\Models\Publication;
use App\MyRequest;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function publications()
    {
        $types = Publication::getAllTypes();
        return view('archive.publications')->with(compact('types'));
    }

    public function postPublications(Request $request)
    {
        $data = MyRequest::all($request);
        $publications = Publication::query();
        if ($data['type'] ?? false) {
            $publications->where('type', $data['type']);
        }
        if ($data['date_from'] ?? false) {
            $publications->where('tarikhe_enteshar', '>=', $data['date_from']);
        }
        if ($data['date_to'] ?? false) {
            $publications->where('tarikhe_enteshar', '<=', $data['date_to']);
        }
        $publications = $publications->get();

        return view('archive.publications-list')->with(compact('publications'));
    }

    public function books()
    {
        $types = Book::getAllTypes();
        return view('archive.books')->with(compact('types'));
    }

    public function postBooks(Request $request)
    {
        $data = MyRequest::all($request);
        $books = book::query();
        if ($data['type'] ?? false) {
            $books->where('type', $data['type']);
        }
        if ($data['date_from'] ?? false) {
            $books->where('enteshar_tarikh', '>=', $data['date_from']);
        }
        if ($data['date_to'] ?? false) {
            $books->where('enteshar_tarikh', '<=', $data['date_to']);
        }
        $books = $books->get();

        return view('archive.books-list')->with(compact('books'));
    }

    public function miz()
    {
        $types = MizLanguage::pluck('language', 'id');
        return view('archive.miz')->with(compact('types'));
    }

    public function postMiz(Request $request)
    {
        $data = MyRequest::all($request);
        $sessions = MizSession::query();
        if ($data['type'] ?? false) {
            $sessions->where('language_id', $data['type']);
        }
        if ($data['date_from'] ?? false) {
            $sessions->where('tarikh', '>=', $data['date_from']);
        }
        if ($data['date_to'] ?? false) {
            $sessions->where('tarikh', '<=', $data['date_to']);
        }
        $sessions = $sessions->get();

        return view('archive.miz-list')->with(compact('sessions'));
    }

    public function projects()
    {
        $types = Project::getAllTypes();
        return view('archive.projects')->with(compact('types'));
    }

    public function postProjects(Request $request)
    {
        $data = MyRequest::all($request);
        $projects = Project::query();
        if ($data['type'] ?? false) {
            $projects->where('type', $data['type']);
        }
        if ($data['date_from'] ?? false) {
            $projects->where('start_date', '>=', $data['date_from']);
        }
        if ($data['date_to'] ?? false) {
            $projects->where('start_date', '<=', $data['date_to']);
        }
        $projects = $projects->get();

        return view('archive.projects-list')->with(compact('projects'));
    }
}
