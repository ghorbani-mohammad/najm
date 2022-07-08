<?php

namespace App\Http\Controllers;


use App\ItemCounterWidget;
use App\Models\Book;
use App\Models\Project;
use App\Models\Publication;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $publications = Publication::groupBy('type')->select('type', DB::raw('count(*) as total'))->get();
        $sum = 0;
        $pubs = [];
        $pubs2 = [];
        foreach ($publications as $publication) {
            $item = new ItemCounterWidget();
            $item->name = Publication::getAllTypes()[$publication->type];
            $item->type = $publication->type;
            $item->count = $publication->total;
            $item->link = \route('publication.all', ['type' => $publication->type]);
            $pubs2[] = $item;
            $pubs[$publication->type] = $publication->total;
            $sum +=  $publication->total;
        }
        $books = Book::groupBy('type')->select('type', DB::raw('count(*) as total'))->get();
        $sum = 0;
        $bs = [];
        $bs2 = [];
        foreach ($books as $book) {
            $item = new ItemCounterWidget();
            $item->name = Book::getAllTypes()[$book->type];
            $item->type = $book->type;
            $item->count = $book->total;
            $item->link = \route('book.all', ['type' => $book->type]);
            $bs2[] = $item;
            $bs[Book::getAllTypes()[$book->type]] = $book->total;
            $sum +=  $book->total;
        }
//        $bs['مجموع کتب'] = $sum;
        $projects = \App\Models\Project::groupBy('type')->select('type', DB::raw('count(*) as total'))->get();
        $sum = 0;
        $prs = [];
        $prs2 = [];
        foreach ($projects as $project) {
            $item = new ItemCounterWidget();
            $item->name = Project::getAllTypes()[$project->type];
            $item->type = $project->type;
            $item->count = $project->total;
            $item->link = \route('project.all', ['type' => $project->type]);
            $prs2[] = $item;
            $prs[\App\Models\Project::getAllTypes()[$project->type]] = $project->total;
            $sum +=  $project->total;
        }
        $prs['مجموع پروژه ها'] = $sum;

        return view('dashboard')->with(compact('pubs', 'bs', 'prs', 'pubs2', 'bs2', 'prs2'));
    }
}
