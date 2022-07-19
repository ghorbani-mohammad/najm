<?php


use App\Models\Publication;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('/', function ($trail) {
    $trail->push('داشبورد', route('/'));
});
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('داشبورد', route('dashboard'));
});

// Publications
Breadcrumbs::for('publication.', function ($trail) {
    $trail->push('نشریات', route('publication.all'));
});
Breadcrumbs::for('publication.all', function ($trail, $type = null) {
    $publication = new Publication();
    $publication->type = $type;
    $trail->parent('publication.');
    $trail->push($publication->getTypeNameAttribute() ?? 'همه', route('publication.all', $type));
});

Breadcrumbs::for('publication.view', function ($trail, Publication $publication) {
    $trail->parent('publication.all', $publication->type);
    $trail->push("شماره {$publication->shomare}", route('publication.view', $publication->id));
});

Breadcrumbs::for('publication.add', function ($trail) {
    $trail->parent('publication.');
    $trail->push("اضافه کردن", route('publication.add'));
});

Breadcrumbs::for('publication.getBazkhordGoroohi', function ($trail) {
    $trail->parent('publication.');
    $trail->push("بازخورد گروهی", route('publication.getBazkhordGoroohi'));
});
Breadcrumbs::for('publication.postBazkhordGoroohi', function ($trail) {
    $trail->parent('publication.');
    $trail->push("بازخورد گروهی", route('publication.postBazkhordGoroohi'));
});
Breadcrumbs::for('publication.getSearch', function ($trail) {
    $trail->parent('publication.');
    $trail->push("جستجو", route('publication.getSearch'));
});
Breadcrumbs::for('publication.postSearch', function ($trail) {
    $trail->parent('publication.');
    $trail->push("جستجو", route('publication.postSearch'));
});

// Publications Maghale
Breadcrumbs::for('publication.maghale.', function ($trail, Publication $publication) {
    $trail->parent('publication.view', $publication);
    $trail->push("مقالات", route('publication.view', $publication->id));
});
Breadcrumbs::for('publication.maghale.view', function ($trail, \App\Models\Maghale $maghale) {
    $trail->parent('publication.maghale.', $maghale->publication);
    $trail->push($maghale->title, route('publication.maghale.view', $maghale->id));
});

// Publication Evaluations
Breadcrumbs::for('publication.evaluations.all', function ($trail, Publication $publication) {
    $trail->parent('publication.view', $publication);
    $trail->push("بازخوردها", route('publication.evaluations.all', $publication));
});
Breadcrumbs::for('publication.evaluations.view', function ($trail, \App\Models\Evaluation $evaluation) {
    $trail->parent('publication.evaluations.all', $evaluation->publication);
    $trail->push($evaluation->marjae, route('publication.evaluations.view', $evaluation->id));
});
// Publication Contents
Breadcrumbs::for('publication.contents.view', function ($trail, Publication $publication) {
    $trail->parent('publication.view', $publication);
    $trail->push("محتوا", route('publication.contents.view', $publication));
});

// Books
Breadcrumbs::for('book.', function ($trail) {
    $trail->push('کتب', route('book.all'));
});
Breadcrumbs::for('book.all', function ($trail, $type = null) {
    $book = new \App\Models\Book();
    $book->type = $type;
    $trail->parent('book.');
    $trail->push($book->getTypeNameAttribute() ?? 'همه', route('book.all', $type));
});

Breadcrumbs::for('book.view', function ($trail, \App\Models\Book $book) {
    $trail->parent('book.all', $book->type);
    $trail->push($book->title, route('book.view', $book));
});

Breadcrumbs::for('book.add', function ($trail) {
    $trail->parent('book.');
    $trail->push("اضافه کردن", route('book.add'));
});
Breadcrumbs::for('book.getSearch', function ($trail) {
    $trail->parent('book.');
    $trail->push("جستجو", route('book.getSearch'));
});
Breadcrumbs::for('book.postSearch', function ($trail) {
    $trail->parent('book.');
    $trail->push("جستجو", route('book.postSearch'));
});
Breadcrumbs::for('book.contents.view', function ($trail, \App\Models\Book $book) {
    $trail->parent('book.view', $book);
    $trail->push("محتوا", route('book.contents.view', $book));
});



// projects
Breadcrumbs::for('project.', function ($trail) {
    $trail->push('پروژه‌های تحقیقاتی', route('project.all'));
});
Breadcrumbs::for('project.all', function ($trail, $type = null) {
    $project = new \App\Models\Project();
    $project->type = $type;
    $trail->parent('project.');
    $trail->push($project->getTypeNameAttribute() ?? 'همه', route('project.all', $type));
});

Breadcrumbs::for('project.view', function ($trail, \App\Models\Project $project) {
    $trail->parent('project.all', $project->type);
    $trail->push($project->name, route('project.view', $project));
});

Breadcrumbs::for('project.add', function ($trail) {
    $trail->parent('project.');
    $trail->push("اضافه کردن", route('project.add'));
});

// project Evaluations
Breadcrumbs::for('project.evaluations.all', function ($trail, \App\Models\Project $project) {
    $trail->parent('project.view', $project);
    $trail->push("بازخوردها", route('project.evaluations.all', $project));
});
Breadcrumbs::for('project.evaluations.view', function ($trail, \App\Models\Evaluation $evaluation) {
    $trail->parent('project.evaluations.all', $evaluation->project);
    $trail->push($evaluation->marjae, route('project.evaluations.view', $evaluation));
});

// miz
Breadcrumbs::for('miz.sessions.', function ($trail) {
    $trail->push('میزهای تخصصی', route('miz.sessions.all'));
});

Breadcrumbs::for('miz.getBazkhordGoroohi', function ($trail) {
    $trail->parent('miz.sessions.');
    $trail->push("بازخورد گروهی", route('miz.getBazkhordGoroohi'));
});
Breadcrumbs::for('miz.postBazkhordGoroohi', function ($trail) {
    $trail->parent('miz.sessions.');
    $trail->push("بازخورد گروهی", route('miz.postBazkhordGoroohi'));
});

Breadcrumbs::for('miz.sessions.all', function ($trail, $languageID = null) {
    $language = \App\Models\MizLanguage::find($languageID);
    $trail->parent('miz.sessions.');
    $trail->push($language->language ?? 'همه', route('miz.sessions.all', $languageID));
});

Breadcrumbs::for('miz.sessions.view', function ($trail, \App\Models\MizSession $session) {
    $trail->parent('miz.sessions.all', $session->language_id);
    $trail->push("شماره {$session->shomare}", route('miz.sessions.view', $session->id));
});

Breadcrumbs::for('miz.sessions.add', function ($trail) {
    $trail->parent('miz.sessions.');
    $trail->push("اضافه کردن جلسه", route('miz.sessions.add'));
});

// miz sessions Evaluations
Breadcrumbs::for('miz.sessions.evaluations.all', function ($trail, \App\Models\MizSession $session) {
    $trail->parent('miz.sessions.view', $session);
    $trail->push("بازخوردها", route('miz.sessions.evaluations.all', $session));
});
Breadcrumbs::for('miz.sessions.evaluations.view', function ($trail, \App\Models\Evaluation $evaluation) {
    $trail->parent('miz.sessions.evaluations.all', $evaluation->session);
    $trail->push($evaluation->marjae, route('miz.sessions.evaluations.view', $evaluation->id));
});
// Miz Session Contents
Breadcrumbs::for('miz.sessions.contents.view', function ($trail, \App\Models\MizSession $session) {
    $trail->parent('miz.sessions.view', $session);
    $trail->push("محتوا", route('miz.sessions.contents.view', $session));
});

Breadcrumbs::for('miz.languages.add', function ($trail) {
    $trail->parent('miz.sessions.');
    $trail->push("اضافه کردن میز", route('miz.languages.add'));
});

Breadcrumbs::for('miz.languages.members', function ($trail, \App\Models\MizLanguage $language) {
    $trail->parent('miz.sessions.all', $language->id);
    $trail->push("اعضای ثابت میز", route('miz.languages.members', $language));
});

Breadcrumbs::for('miz.languages.update', function ($trail, \App\Models\MizLanguage $language) {
    $trail->parent('miz.sessions.all', $language->id);
    $trail->push("ویرایش میز", route('miz.languages.members', $language));
});

Breadcrumbs::for('miz.sessions.members', function ($trail, \App\Models\MizSession $session) {
    $trail->parent('miz.sessions.view', $session);
    $trail->push("حاضرین", route('miz.sessions.members', $session));
});

Breadcrumbs::for('miz.sessions.update-member', function ($trail, \App\Models\MizSessionMember $member) {
    $session = \App\Models\MizSession::find($member->session_id);
    $trail->parent('miz.sessions.members', $session);
    $trail->push($member->name, route('miz.sessions.update-member', $member));
});



Breadcrumbs::for('personnel', function ($trail) {
    $trail->push("پژوهشگران", route('all-personnel-list'));
});

Breadcrumbs::for('all-personnel-list', function ($trail) {
    $trail->parent('personnel');
    $trail->push("همه", route('all-personnel-list'));
});

Breadcrumbs::for('search-personnel', function ($trail) {
    $trail->parent('personnel');
    $trail->push("جستجو", route('search-personnel'));
});

Breadcrumbs::for('get-personnel-info', function ($trail, $id) {
    $person = \App\Models\Personnel::find($id);
    $trail->parent('personnel');
    $trail->push($person->name, route('get-personnel-info', $id));
});

Breadcrumbs::for('personnel.activities', function ($trail, \App\Models\Personnel $person) {
    $trail->parent('get-personnel-info', $person->id);
    $trail->push("فعالیت‌ها", route('personnel.activities', $person->id));
});

Breadcrumbs::for('search-personnel-form', function ($trail) {
    $trail->parent('personnel');
    $trail->push("جستجو", route('search-personnel-form'));
});

Breadcrumbs::for('add-personnel-form', function ($trail) {
    $trail->parent('personnel');
    $trail->push("اضافه کردن", route('add-personnel-form'));
});

// archive
Breadcrumbs::for('archive', function ($trail) {
    $trail->push('آرشیو', route('archive.publications'));
});

Breadcrumbs::for('archive.publications', function ($trail) {
    $trail->parent('archive');
    $trail->push('نشریات', route('archive.publications'));
});
Breadcrumbs::for('archive.postPublications', function ($trail) {
    $trail->parent('archive');
    $trail->push('نشریات', route('archive.postPublications'));
});

Breadcrumbs::for('archive.books', function ($trail) {
    $trail->parent('archive');
    $trail->push('کتب', route('archive.books'));
});

Breadcrumbs::for('archive.projects', function ($trail) {
    $trail->parent('archive');
    $trail->push('پروژه های تحقیقاتی', route('archive.projects'));
});

Breadcrumbs::for('archive.miz', function ($trail) {
    $trail->parent('archive');
    $trail->push('میزها', route('archive.miz'));
});

Breadcrumbs::for('archive.postBooks', function ($trail) {
    $trail->parent('archive');
    $trail->push('کتب', route('archive.postBooks'));
});

Breadcrumbs::for('archive.postProjects', function ($trail) {
    $trail->parent('archive');
    $trail->push('پروژه های تحقیقاتی', route('archive.postProjects'));
});

Breadcrumbs::for('archive.postMiz', function ($trail) {
    $trail->parent('archive');
    $trail->push('میزها', route('archive.postMiz'));
});

Breadcrumbs::for('report', function ($trail) {
    $trail->push('گزارش‌ها', route('report.products'));
});

Breadcrumbs::for('report.products', function ($trail) {
    $trail->parent('report');
    $trail->push('محصولات', route('report.products'));
});
Breadcrumbs::for('report.post-products', function ($trail) {
    $trail->parent('report');
    $trail->push('محصولات', route('report.post-products'));
});


Breadcrumbs::for('report.personnel', function ($trail) {
    $trail->parent('report');
    $trail->push('مقایسسه همکاران', route('report.personnel'));
});
Breadcrumbs::for('report.post-personnel', function ($trail) {
    $trail->parent('report');
    $trail->push('مقایسه همکاران', route('report.post-personnel'));
});

Breadcrumbs::for('report.person', function ($trail) {
    $trail->parent('report');
    $trail->push('فعالیت پژوهشگر', route('report.person'));
});
Breadcrumbs::for('report.post-person', function ($trail) {
    $trail->parent('report');
    $trail->push('فعالیت پژوهشگر', route('report.post-person'));
});

Breadcrumbs::for('user.list', function ($trail) {
    $trail->push('لیست کاربران', route('user.list'));
});

