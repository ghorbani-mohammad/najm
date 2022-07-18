<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MizController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\TahrirMoshaverController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
})->name('/');

Route::get('backup', [\App\Http\Controllers\ZipArchiveController::class, 'zipDownload']);

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::prefix('personnel')->name('personnel.')->group(function () {
        Route::get('download-resume/{person}', [PersonnelController::class, 'downloadResume'])->name('download-resume');

        Route::name('language.')->prefix('language')->group(function () {
            Route::post('add/{person}', [PersonnelController::class, 'addLanguage'])->name('add');
            Route::get('delete/{language}', [PersonnelController::class, 'deleteLanguage'])->name('delete');
        });
        Route::get('activities/{person}', [PersonnelController::class, 'activities'])->name('activities');
    });

    Route::name('documents.')->prefix('documents')->group(function () {
        Route::post('add-document/{person}', [DocumentController::class, 'addDocument'])->name('add');
        Route::get('delete-document/{document}', [DocumentController::class, 'deleteDocument'])->name('delete');
        Route::get('download-document/{document}', [DocumentController::class, 'downloadDocument'])->name('download');
    });

    Route::name('jobs.')->prefix('jobs')->group(function () {
        Route::post('add-job/{person}', [JobController::class, 'addJob'])->name('add');
        Route::get('delete-job/{job}', [JobController::class, 'deleteJob'])->name('delete');
        Route::get('download-job/{job}', [JobController::class, 'downloadJob'])->name('download');
    });

    Route::get('all-personnel', [PersonnelController::class, 'getAllList'])->name('all-personnel-list');
    Route::get('add-personnel', [PersonnelController::class, 'getAddPersonnel'])->name('add-personnel-form');
    Route::post('add-personnel', [PersonnelController::class, 'postAddPersonnel'])->name('add-personnel');
    Route::get('search-personnel', [PersonnelController::class, 'getSearchPersonnel'])->name('search-personnel-form');
    Route::post('search-personnel', [PersonnelController::class, 'postSearchPersonnel'])->name('search-personnel');

    Route::get('personnel/{id}', [PersonnelController::class, 'getPersonnelInfo'])->name('get-personnel-info');
    Route::post('update-personnel/{personId}', [PersonnelController::class, 'postUpdatePersonnel'])->name('update-personnel-info');

    Route::post('add-job/{id}', [PersonnelController::class, 'addJob'])->name('add-job');

    Route::name('publication.')->prefix('publication')->group(function () {
        Route::get('view/{publication}', [PublicationController::class, 'view'])->name('view');
        Route::post('view/{publication}', [PublicationController::class, 'update'])->name('update');
        Route::get('delete/{publication}', [PublicationController::class, 'delete'])->name('delete');
        Route::get('add', [PublicationController::class, 'add'])->name('add');
        Route::post('add', [PublicationController::class, 'postAdd'])->name('add');
        Route::get('all/{type?}', [PublicationController::class, 'all'])->name('all');
        Route::get('bazkhordGoroohi', [PublicationController::class, 'getBazkhordGoroohi'])->name('getBazkhordGoroohi');
        Route::post('bazkhordGoroohi', [PublicationController::class, 'postBazkhordGoroohi'])->name('postBazkhordGoroohi');
        Route::get('search', [PublicationController::class, 'getSearch'])->name('getSearch');
        Route::post('search', [PublicationController::class, 'postSearch'])->name('postSearch');

        Route::name('tahrir.')->prefix('tahrir')->group(function () {
            Route::post('add-person/{publication}', [TahrirMoshaverController::class, 'addPersonToTahrir'])->name('add');
            Route::get('delete-person/{person}', [TahrirMoshaverController::class, 'deletePersonFromTahrir'])->name('delete');
        });

        Route::name('maghale.')->prefix('maghale')->group(function () {
            Route::post('add/{publication}', [PublicationController::class, 'addMaghaleToPublication'])->name('add');
            Route::get('delete/{maghale}', [PublicationController::class, 'deleteMaghaleFromPublication'])->name('delete');
            Route::get('view/{maghale}', [PublicationController::class, 'getViewMaghale'])->name('view');
            Route::post('view/{maghale}', [PublicationController::class, 'postViewMaghale']);
        });

        Route::name('moshaver.')->prefix('moshaver')->group(function () {
            Route::post('add-person/{publication}', [TahrirMoshaverController::class, 'addPersonToMoshaver'])->name('add');
            Route::get('delete-person/{person}', [TahrirMoshaverController::class, 'deletePersonFromMoshaver'])->name('delete');
        });

        Route::name('files.')->prefix('files')->group(function () {
            Route::post('add/{publication}', [PublicationController::class, 'addFile'])->name('add');
            Route::get('delete/{file}', [PublicationController::class, 'deleteFile'])->name('delete');
            Route::get('download/{file}', [PublicationController::class, 'downloadFile'])->name('download');
        });

        Route::name('evaluations.')->prefix('evaluations')->group(function () {
            Route::get('all/{publication}', [PublicationController::class, 'getAllEvaluations'])->name('all');
            Route::get('view/{evaluation}', [PublicationController::class, 'getEvaluation'])->name('view');
            Route::post('view/{evaluation}', [PublicationController::class, 'postViewEvaluation'])->name('update');
            Route::post('add/{publication}', [PublicationController::class, 'addEvaluation'])->name('add');
            Route::get('delete/{evaluation}', [PublicationController::class, 'deleteEvaluation'])->name('delete');
            Route::get('download/{evaluation}', [PublicationController::class, 'downloadEvaluation'])->name('download');
        });

        Route::name('contents.')->prefix('contents')->group(function () {
            Route::get('view/{publication}', [PublicationController::class, 'getContentsView'])->name('view');
        });
    });

    Route::name('miz.')->prefix('miz')->group(function () {
        Route::name('languages.')->prefix('language')->group(function () {
            Route::get('add', [MizController::class, 'addLanguage'])->name('add');
            Route::post('add', [MizController::class, 'postAddLanguage'])->name('post-add');
            Route::get('delete/{language}', [MizController::class, 'deleteLanguage'])->name('delete');
            Route::get('update/{language}', [MizController::class, 'updateLanguage'])->name('update');
            Route::post('update/{language}', [MizController::class, 'postUpdateLanguage'])->name('update-post');
            Route::get('members/{language}', [MizController::class, 'getMembers'])->name('members');
            Route::post('members/{language}', [MizController::class, 'postMembers'])->name('post-members');
            Route::get('members/delete/{member}', [MizController::class, 'deleteMember'])->name('members.delete');
        });
        Route::name('sessions.')->prefix('session')->group(function () {
            Route::get('all/{language?}', [MizController::class, 'allSessions'])->name('all');
            Route::get('add', [MizController::class, 'add'])->name('add');
            Route::post('add', [MizController::class, 'postAdd'])->name('post-add');
            Route::get('view/{session}', [MizController::class, 'view'])->name('view');
            Route::post('view/{session}', [MizController::class, 'update'])->name('update');

            Route::get('members/{session}', [MizController::class, 'getSessionMembers'])->name('members');
            Route::post('members/variable/{session}', [MizController::class, 'postVariableMembers'])->name('post-variable-members');
            Route::post('members/permanent/{session}', [MizController::class, 'postPermanentMembers'])->name('post-permanent-members');
            Route::get('members/delete/{member}', [MizController::class, 'deleteSessionMember'])->name('members.delete');
            Route::get('members/update/{member}', [MizController::class, 'getUpdateMember'])->name('update-member');
            Route::post('members/update/{member}', [MizController::class, 'postUpdateMember'])->name('post-update-member');

            Route::name('evaluations.')->prefix('evaluations')->group(function () {
                Route::get('all/{session}', [MizController::class, 'getAllEvaluations'])->name('all');
                Route::get('view/{evaluation}', [MizController::class, 'getEvaluation'])->name('view');
                Route::post('view/{evaluation}', [MizController::class, 'postViewEvaluation'])->name('update');
                Route::post('add/{session}', [MizController::class, 'addEvaluation'])->name('add');
                Route::get('delete/{evaluation}', [MizController::class, 'deleteEvaluation'])->name('delete');
                Route::get('download/{evaluation}', [MizController::class, 'downloadEvaluation'])->name('download');
            });


            Route::name('files.')->prefix('files')->group(function () {
                Route::post('add/{session}', [MizController::class, 'addFile'])->name('add');
                Route::get('delete/{file}', [MizController::class, 'deleteFile'])->name('delete');
                Route::get('download/{file}', [MizController::class, 'downloadFile'])->name('download');
            });

            Route::name('contents.')->prefix('contents')->group(function () {
                Route::get('view/{session}', [MizController::class, 'getContentsView'])->name('view');
            });
        });
        Route::get('bazkhordGoroohi', [MizController::class, 'getBazkhordGoroohi'])->name('getBazkhordGoroohi');
        Route::post('bazkhordGoroohi', [MizController::class, 'postBazkhordGoroohi'])->name('postBazkhordGoroohi');
    });

    Route::name('book.')->prefix('book')->group(function () {
        Route::get('view/{book}', [BookController::class, 'view'])->name('view');
        Route::post('view/{book}', [BookController::class, 'update'])->name('update');
        Route::get('delete/{book}', [BookController::class, 'delete'])->name('delete');
        Route::get('add', [BookController::class, 'add'])->name('add');
        Route::post('add', [BookController::class, 'postAdd'])->name('add');
        Route::get('all/{type?}', [BookController::class, 'all'])->name('all');
        Route::get('search', [BookController::class, 'getSearch'])->name('getSearch');
        Route::post('search', [BookController::class, 'postSearch'])->name('postSearch');


        Route::name('files.')->prefix('files')->group(function () {
            Route::post('add/{book}', [BookController::class, 'addFile'])->name('add');
            Route::get('delete/{file}', [BookController::class, 'deleteFile'])->name('delete');
            Route::get('download/{file}', [BookController::class, 'downloadFile'])->name('download');
        });

        Route::name('contents.')->prefix('contents')->group(function () {
            Route::get('view/{book}', [BookController::class, 'getContentsView'])->name('view');
        });
    });

    Route::name('project.')->prefix('project')->group(function () {
        Route::get('view/{project}', [ProjectController::class, 'view'])->name('view');
        Route::post('view/{project}', [ProjectController::class, 'update'])->name('update');
        Route::get('add', [ProjectController::class, 'add'])->name('add');
        Route::post('add', [ProjectController::class, 'postAdd'])->name('add');
        Route::get('all/{type?}', [ProjectController::class, 'all'])->name('all');
        Route::get('download-gharardad/{project}', [ProjectController::class, 'downloadGharardad'])->name('download-gharardad');

        Route::name('reports.')->prefix('reports')->group(function () {
            Route::post('add/{project}', [ProjectController::class, 'addReport'])->name('add');
            Route::get('delete/{report}', [ProjectController::class, 'deleteReport'])->name('delete');
            Route::get('download/{report}', [ProjectController::class, 'downloadReport'])->name('download');
        });

        Route::name('files.')->prefix('files')->group(function () {
            Route::post('add/{project}', [ProjectController::class, 'addMadarek'])->name('add');
            Route::get('delete/{file}', [ProjectController::class, 'deleteMadarek'])->name('delete');
            Route::get('download/{file}', [ProjectController::class, 'downloadMadarek'])->name('download');
        });

        Route::name('evaluations.')->prefix('evaluations')->group(function () {
            Route::get('all/{project}', [ProjectController::class, 'getAllEvaluations'])->name('all');
            Route::get('view/{evaluation}', [ProjectController::class, 'getEvaluation'])->name('view');
            Route::post('view/{evaluation}', [ProjectController::class, 'postViewEvaluation'])->name('update');
            Route::post('add/{project}', [ProjectController::class, 'addEvaluation'])->name('add');
            Route::get('delete/{evaluation}', [ProjectController::class, 'deleteEvaluation'])->name('delete');
            Route::get('download/{evaluation}', [ProjectController::class, 'downloadEvaluation'])->name('download');
        });
    });

    Route::name('archive.')->prefix('archive')->group(function(){
        Route::get('publications', [ArchiveController::class, 'publications'])->name('publications');
        Route::post('publications', [ArchiveController::class, 'postPublications'])->name('postPublications');
        Route::get('books', [ArchiveController::class, 'books'])->name('books');
        Route::post('books', [ArchiveController::class, 'postBooks'])->name('postBooks');
        Route::get('projects', [ArchiveController::class, 'projects'])->name('projects');
        Route::post('projects', [ArchiveController::class, 'postProjects'])->name('postProjects');
        Route::get('miz', [ArchiveController::class, 'miz'])->name('miz');
        Route::post('miz', [ArchiveController::class, 'postMiz'])->name('postMiz');
    });

    Route::name('report.')->prefix('report')->group(function (){
        Route::get('products', [ReportsController::class, 'products'])->name('products');
        Route::post('products', [ReportsController::class, 'postProducts'])->name('post-products');
        Route::get('personnel', [ReportsController::class, 'personnel'])->name('personnel');
        Route::post('personnel', [ReportsController::class, 'postPersonnel'])->name('post-personnel');
        Route::get('person', [ReportsController::class, 'person'])->name('person');
        Route::post('person', [ReportsController::class, 'postPerson'])->name('post-person');
    });
});
