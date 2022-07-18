<?php

namespace App\Http\Controllers;

use App\Models\ForeignLanguage;
use App\Models\Personnel;
use App\MyRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Morilog\Jalali\Jalalian;

class PersonnelController extends Controller
{
    public function getAllList()
    {
        $personnel = Personnel::all();
        $total = count($personnel);
        $moghim = $personnel->where('status', true)->count();
        $gheyrmoghim = $personnel->where('status', false)->count();
        $count = [];
        foreach ($personnel as $person) {
            $count[$person->id] = $person->publications()['total'];
        }

        arsort($count);
        $persons = array_slice($count, 0, 4, true);
        $lastThree = collect();
        foreach ($persons as $personID=>$no){
            $lastThree->push($personnel->where('id', $personID)->first());
        }

        return view('all-personnel-list', [
            'personnel' => $personnel,
            'total' => $total,
            'moghim' => $moghim,
            'gheyrmoghim' => $gheyrmoghim,
            'lastThree' => $lastThree,
        ]);
    }

    public function getAddPersonnel()
    {
        return view('add-person-form');
    }

    public function postAddPersonnel(Request $request)
    {
        $data = MyRequest::all($request);
        $person = new Personnel($data['info']);
        $person->save();

        if ($data['file']['resume'] ?? false) {
            $person->resume_link = $person->storeFile($data['file']['resume']);
            $person->save();
        }

        if ($data['file']['profile_pic'] ?? false) {
            $person->savePhoto($data['file']['profile_pic']);
        }

        return redirect()->route('all-personnel-list');
    }

    public function getSearchPersonnel()
    {
        return view('search-person-form');
    }

    public function postSearchPersonnel(Request $request)
    {
        $data = MyRequest::all($request);
        $person = Personnel::query();
        foreach ($data['info'] as $key => $field) {
            if ($field == null) {
                continue;
            }
            $person->where($key, 'like', "%$field%");;
        }

        $person = $person->get();

        $total = count($person);
        $moghim = $person->where('status', true)->count();
        $gheyrmoghim = $person->where('status', false)->count();
        $count = [];
        foreach ($person as $p) {
            $count[$p->id] = $p->publications()['total'];
        }

        arsort($count);
        $persons = array_slice($count, 0, 4, true);
        $lastThree = collect();
        foreach ($persons as $personID=>$no){
            $lastThree->push($person->where('id', $personID)->first());
        }

        return view('all-personnel-list', [
            'personnel' => $person,
            'total' => $total,
            'moghim' => $moghim,
            'gheyrmoghim' => $gheyrmoghim,
            'lastThree' => $lastThree,
        ]);
    }

    public function getPersonnelInfo($id)
    {
        $person = Personnel::with(['jobs', 'documents'])->find($id);
        if (!$person) {
            return redirect()->back()->with('message', 'همکار مورد نظر در سامانه پیدا نشد');
        }

        return view('update-person-form', ['person' => $person]);
    }

    public function deletePersonnel($id)
    {
        $person = Personnel::find($id);
        $person->delete()
        return redirect()->back()->with('message', 'حذف شد');
    }

    public function postUpdatePersonnel(Request $request, $personId)
    {
        $data = MyRequest::all($request);
        /** @var Personnel $person */
        $person = Personnel::find($personId);
        foreach ($data['info'] as $key => $field) {
            $person->$key = $field;
        }
        if ($data['file']['resume'] ?? false) {
            $person->resume_link = $person->storeFile($data['file']['resume']);
            $person->save();
        }
        if ($data['file']['profile_pic'] ?? false) {
            $person->savePhoto($data['file']['profile_pic']);
        }
        $person->save();

        return redirect()->route('all-personnel-list');
    }

    public function downloadResume(Personnel $person)
    {
        if ($person->resume_link) {
            return Storage::disk('files')->download($person->resume_link);
        }

        return redirect()->back();
    }

    public function addLanguage(Request $request, Personnel $person)
    {
        $language = new ForeignLanguage();
        foreach ($request->get('addLanguage') as $key => $value) {
            $language->$key = $value;
        }

        $person->languages()->save($language);

        return redirect()->back();
    }

    public function deleteLanguage(ForeignLanguage $language)
    {
        $language->delete();

        return redirect()->back();
    }

    public function activities(Personnel $person)
    {
        $publications = $person->publications();
        $data = [];
        foreach ($publications['publications'] as $publication) {
            $timeFrame = Jalalian::fromCarbon(Carbon::parse($publication->tarikhe_enteshar));
            if ($data["{$timeFrame->getYear()}"]["{$timeFrame->getMonth()}"]['publications'] ?? false) {
                $data["{$timeFrame->getYear()}"]["{$timeFrame->getMonth()}"]['publications']++;
            } else {
                $data["{$timeFrame->getYear()}"]["{$timeFrame->getMonth()}"]['publications'] = 1;
            }
        }
        foreach ($publications['maghales'] as $publication) {
            $timeFrame = Jalalian::fromCarbon(Carbon::parse($publication->publication->tarikhe_enteshar));
            if ($data["{$timeFrame->getYear()}"]["{$timeFrame->getMonth()}"]['maghales'] ?? false) {
                $data["{$timeFrame->getYear()}"]["{$timeFrame->getMonth()}"]['maghales']++;
            } else {
                $data["{$timeFrame->getYear()}"]["{$timeFrame->getMonth()}"]['maghales'] = 1;
            }
        }
        foreach ($publications['books'] as $publication) {
            $timeFrame = Jalalian::fromCarbon(Carbon::parse($publication->enteshar_tarikh));
            if ($data["{$timeFrame->getYear()}"]["{$timeFrame->getMonth()}"]['books'] ?? false) {
                $data["{$timeFrame->getYear()}"]["{$timeFrame->getMonth()}"]['books']++;
            } else {
                $data["{$timeFrame->getYear()}"]["{$timeFrame->getMonth()}"]['books'] = 1;
            }
        }
//        dump($data);
        asort($data);
//        dump($data);
        $result = [];
        $yAxis = [];
        $result2 = [];
        foreach ($data as $year => $records) {
//            dump($records);
            asort($records);
//            dd($records);
            foreach ($records as $month => $counts) {
                $frame = "$year-$month";
                $yAxis[] = $frame;
                $result2['publications'][] = $counts['publications'] ?? 0;
                $result2['maghales'][] = $counts['maghales'] ?? 0;
                $result2['books'][] = $counts['books'] ?? 0;
                $result[] = [
                    'frame' => $frame,
                    'publications' => $counts['publications'] ?? 0,
                    'maghales' => $counts['maghales'] ?? 0,
                    'books' => $counts['books'] ?? 0,
                ];
            }
        }
        return view('reports.person-result', compact('publications', 'result','person', 'yAxis', 'result2'));
    }

}
