<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Maghale;
use App\Models\Publication;
use App\Models\PublicationFiles;
use App\MyRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class PublicationController extends Controller
{
    public function view(Publication $publication)
    {
        $fields = Publication::getAllFields($publication->type);
        $types = Publication::getAllTypes();
        $extraFields = Publication::getAllSpecialConditions($publication->type);

        $publication->load(['maghale', 'files', 'tahrir', 'moshaver']);
        return view('publications.update-publication-form-small')->with([
            'hasMaghale' => $publication->hasMaghale(),
            'publication' => $publication,
            'fields' => $fields,
            'types' => $types,
            'extraFields' => $extraFields,
        ]);
    }

    public function update(Publication $publication, Request $request)
    {
        $data = MyRequest::all($request);
        foreach ($data['info'] as $key => $field) {
            $publication->$key = $field;
        }
        $publication->save();

        return redirect()->back();
    }

    public function add()
    {
        $fields = Publication::getAllFields();
        $types = Publication::getAllTypes();

        return view('publications.add-publication-form')->with([
            'fields' => $fields,
            'types' => $types,
        ]);
    }

    public function postAdd(Request $request)
    {
        $data = MyRequest::all($request);
        $publication = new Publication($data['info']);
        $publication->save();

        return redirect()->route('publication.view', ['publication' => $publication->id]);
    }

    public function all($type = null)
    {
        if ($type != null) {
            $a = Jalalian::now();
            if ($a->getMonth() != 1) {
                $a = $a->subMonths($a->getMonth()-1);
            }
            if ($a->getDay() != 1) {
                $a = $a->subDays($a->getDay()-1);
            }
            $start = $a->toCarbon();
            $publications = Publication::with('evaluations')->where('type', $type)->get();
            $total = count($publications);
            $currentYearTotal = $publications->where('tarikhe_enteshar', '>=', $start)->count();
            $bazkhordTotal = 0;
            foreach ($publications as $publication){
                $bazkhordTotal += count($publication->evaluations);
            }
            $name = "";
            if(count($publications) > 0) {
                $name = $publications[0]->getTypeNameAttribute() ?? "";
            }
        } else {
            $a = Jalalian::now();
            if ($a->getMonth() != 1) {
                $a = $a->subMonths($a->getMonth()-1);
            }
            if ($a->getDay() != 1) {
                $a = $a->subDays($a->getDay()-1);
            }
            $start = $a->toCarbon();            $currentYearTotal = Publication::where('tarikhe_enteshar', '>=', $start)->count();
            $bazkhordTotal = Evaluation::whereNotNull('publication_id')->count();
            $publications = Publication::all();
            $total = count($publications);
            $name = "نشریات";
        }

        $lastThree = $publications->sortByDesc('id')->take(4);

        return view('publications.all-publications-list')->with([
            'publications' => $publications,
            'tableTitle' => $name,
            'total' => $total,
            'currentYearTotal' => $currentYearTotal,
            'bazkhordTotal' => $bazkhordTotal,
            'lastThree' => $lastThree,
        ]);
    }

    public function addMaghaleToPublication(Request $request, Publication $publication)
    {
        $data = MyRequest::all($request);
        $maghale = new Maghale($data['addMaghale']);
        $publication->maghale()->save($maghale);

        return redirect()->back();
    }

    public function deleteMaghaleFromPublication(Maghale $maghale)
    {
        $maghale->delete();

        return redirect()->back();
    }

    public function addFile(Request $request, Publication $publication)
    {
        $file = new PublicationFiles();
        $file->link = $publication->storeFile($request->file('addFiles.file'));
        $file->name = $request->file('addFiles.file')->getClientOriginalName();
        $file->publication_id = $publication->id;
        $file->is_cover = $request->get('addFiles')['is_cover'] ?? false;
        $file->save();

        return redirect()->back();
    }

    public function deleteFile(PublicationFiles $file)
    {
        $file->delete();

        return redirect()->back();
    }

    public function downloadFile(PublicationFiles $file)
    {
        return Storage::disk('files')->download($file->link);
    }

    public function getAllEvaluations(Publication $publication)
    {
        $publication->load(['evaluations']);
        $stats = Evaluation::getstat($publication->evaluations);
        $stats['publication'] = $publication;

        return view('publications.all-evaluations')->with($stats);
    }

    public function getEvaluation(Evaluation $evaluation)
    {
        return view('publications.update-evaluation')->with([
            'evaluation' => $evaluation,
        ]);
    }

    public function addEvaluation(Request $request, Publication $publication)
    {
        $evaluation = new Evaluation();
        foreach ($request->get('addEvaluation') as $key => $value) {
            $evaluation->$key = $value;
        }
        $evaluation->publication_id = $publication->id;
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

    public function getBazkhordGoroohi()
    {
        $types = Publication::getAllTypes();
        return view('publications.bazkhord-goroohi')->with(
            [
                'types' => $types
            ]
        );
    }

    public function postBazkhordGoroohi(Request $request)
    {
        $data = MyRequest::all($request);
        $publications = Publication::with('evaluations')->where('type', $request->get('type'));
        if ($data['shomare_az'] ?? false) {
            $publications->where('shomare_mosalsal', '>=', $data['shomare_az']);
        }
        if ($data['shomare_ta'] ?? false) {
            $publications->where('shomare_mosalsal', '<', $data['shomare_ta']);
        }
        if ($data['tarikh_az'] ?? false) {
            $publications->where('tarikhe_enteshar', '>=', $data['tarikh_az']);
        }
        if ($data['tarikh_ta'] ?? false) { //todo: ridam
            $publications->where('tarikhe_enteshar', '<', $data['tarikh_ta']);
        }
        $needMianginCheck = false;
        $min = 0;
        $max = 5;
        if ($request->get('miangin_az')) {
            $min = $request->get('miangin_az');
            $needMianginCheck = true;
        }
        if ($request->get('miangin_ta')) {
            $max = $request->get('miangin_ta');
            $needMianginCheck = true;
        }
        $publications = $publications->get();
        $selectedPublications = [];
        $evaluations = [];
        foreach ($publications as $publication) {
            if ($needMianginCheck) {
                $stat = Evaluation::getstat($publication->evaluations);
                if ($stat['average']['kol'] >= $min && $stat['average']['kol']  <= $max) {
                    $selectedPublications[] = $publication;
                } else {
                    continue;
                }
            } else {
                $selectedPublications[] = $publication;
            }
            foreach ($publication->evaluations as $evaluation) {
                $evaluations[] = $evaluation;
            }
        }
        $stats = Evaluation::getstat($evaluations);
        $stats['publications'] = $selectedPublications;

        return view('publications.bazkhord-goroohi-result')->with($stats);
    }

    public function getContentsView(Publication $publication)
    {
        $publication->load(['files']);
        return view('publications.fileContents')->with([
            'publication' => $publication,
        ]);
    }

    public function getViewMaghale(Maghale $maghale)
    {
        return view('publications.update-maghale')->with([
            'maghale' => $maghale,
        ]);
    }

    public function postViewMaghale(Request $request, Maghale $maghale)
    {
        foreach (MyRequest::get($request, 'addMaghale') as $key => $value) {
            $maghale->$key = $value;
        }
        $maghale->save();

        return redirect()->back();
    }

    public function getSearch()
    {
        return view('publications.search');
    }

    public function postSearch(Request $request)
    {
        $data = MyRequest::get($request, 'search');
        $q = $data['q'] ?? null;
        $query = Publication::query();
        $fields = ['type', 'sal', 'fasl', 'hazine_maghalat', 'hazine_type', 'hazine_safhe_arayi', 'hazine_tarahi_jeld',
            'hazine_davaran', 'hazine_nezarat_fani', 'hazine_nezarat_adabi', 'hazine_chap', 'hazine_majmooe',
            'hazine_moshavere', 'hazine_manabe_mostanadat', 'hazine_elsagh_ghardad', 'heyat_sardabir', 'heyat_modir_masool',
            'heyat_nazer_ali', 'heyat_nazer_elmi', 'heyat_nazer_fani', 'heyat_modir_ejrayi', 'heyat_tarrahe_jeld',
            'heyat_virastar_elmi', 'heyat_virastar_adabi', 'heyat_nemoone_khan', 'shomare', 'tarikhe_enteshar',
            'shomare_mosalsal', 'shomaregan', 'title', 'title_en', 'authors', 'keshvar', 'moassese_montasher_konande',
            'tahie_konande', 'ravesh_tahie'];
        foreach ($fields as $field) {
            $query->orWhere($field, 'like', "%{$q}%");
        }

        $ids = $query->pluck('id')->toArray();

        $query2 = Maghale::query();
        $fields2 = ['title', 'title_en', 'authors', 'davar'];
        foreach ($fields2 as $field) {
            $query2->orWhere($field, 'like', "%{$q}%");
        }
//        dd($ids, $query->toSql(), $query->getBindings());
        $id2s = $query2->pluck('publication_id')->toArray();
//        dd($ids, $id2s);
        $allIds = array_merge($ids, $id2s);
        if ($data['date_to'] || $data['date_from']) {
            $query = Publication::whereIn('id', $allIds);
            if ($data['date_from'] ?? false) {
                    $query->where('tarikhe_enteshar', '>=', $data['date_from']);
            }
            if ($data['date_to'] ?? false) {
                $query->where('tarikhe_enteshar', '<=', $data['date_to']);
            }
            $allIds = $query->pluck('id')->toArray();
        }
        $publications = Publication::whereIn('id', $allIds)->get();

        $a = Jalalian::now();

        if ($a->getMonth() != 1) {
            $a = $a->subMonths($a->getMonth()-1);
        }
        if ($a->getDay() != 1) {
            $a = $a->subDays($a->getDay()-1);
        }
        $start = $a->toCarbon();
        //        $start = Carbon::now()->startOfYear();
        $total = count($publications);
        $currentYearTotal = $publications->where('tarikhe_enteshar', '>=', $start)->count();
        $bazkhordTotal = 0;
        foreach ($publications as $publication){
            $bazkhordTotal += count($publication->evaluations);
        }
        $lastThree = $publications->sortByDesc('id')->take(4);

        return view('publications.search-result')->with([
            'publications' => $publications,
            'total' => $total,
            'currentYearTotal' => $currentYearTotal,
            'bazkhordTotal' => $bazkhordTotal,
            'lastThree' => $lastThree,
        ]);
    }
}
