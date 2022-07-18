<?php

namespace App\Http\Composers;


use App\Models\Book;
use App\Models\MizLanguage;
use App\Models\Project;
use App\Models\Publication;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AppLayoutComposer
{
    public function compose(View $view)
    {
        $view->with([
            'projectTypes' => Project::getAllTypes(),
            'publicationTypes' => Publication::getAllTypes(),
            'bookTypes' => Book::getAllTypes(),
            'mizLanguages' => MizLanguage::orderBy('id')->all(),
        ]);
    }
}
