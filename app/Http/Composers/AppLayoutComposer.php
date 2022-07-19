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
        $x = MizLanguage::join('miz_sessions', 'miz_languages.id', '=', 'miz_sessions.language_id')
                        ->select('miz_languages.id', 'miz_languages.language', 'miz_sessions.created_at')
                        ->orderBy('created_at', 'DESC')
                        ->get();
        $x = $x->unique('id');
        $y = MizLanguage::all();
        $view->with([
            'projectTypes' => Project::getAllTypes(),
            'publicationTypes' => Publication::getAllTypes(),
            'bookTypes' => Book::getAllTypes(),
            'mizLanguages' => $x->merge($y),
        ]);
    }
}
