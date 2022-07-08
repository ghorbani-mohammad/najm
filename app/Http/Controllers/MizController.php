<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Evaluation;
use App\Models\Maghale;
use App\Models\MizFiles;
use App\Models\MizLanguage;
use App\Models\MizLanguageMember;
use App\Models\MizSession;
use App\Models\MizSessionMember;
use App\Models\Publication;
use App\Models\PublicationFiles;
use App\MyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Morilog\Jalali\Jalalian;
use Symfony\Component\Console\Input\Input;

class MizController extends Controller
{
    public function addLanguage()
    {
        $languages = MizLanguage::all();
        return view('miz.add-language')->with([
            'languages' => $languages,
        ]);
    }

    public function postAddLanguage(Request $request)
    {
        $language = new MizLanguage();
        $language->language = $request->get('language');
        $language->save();

        return redirect()->back();
    }

    public function deleteLanguage(MizLanguage $language)
    {
        $language->delete();

        return redirect()->back();
    }

    public function allSessions($language = null)
    {
        if ($language != null) {
            $language = MizLanguage::find($language);
            $sessions = MizSession::where('language_id', $language->id)->get();
        } else {
            $sessions = MizSession::all();
        }
        $allLanguages = MizLanguage::count();
        $allMembers = MizSessionMember::distinct('name')->count();
        $sessionsCount = count($sessions);

        $lastThree = $sessions->sortByDesc('id')->take(3);

        return view('miz.all-sessions-list')->with([
            'language' => $language,
            'sessions' => $sessions,
            'allLanguages' => $allLanguages,
            'allMembers' => $allMembers,
            'sessionsCount' => $sessionsCount,
            'lastThree' => $lastThree,
        ]);

    }

    public function view(MizSession $session)
    {
        $fields = MizSession::getAllFields();
        $languages = MizLanguage::all();
        $session->load(['files']);

        return view('miz.update-session-form')->with([
            'session' => $session,
            'fields' => $fields,
            'languages' => $languages,
        ]);
    }

    public function update(MizSession $session, Request $request)
    {
        $data = MyRequest::all($request);
        $data['info'] = $this->convertDates($data['info']);
        foreach ($data['info'] as $key => $field) {
            $session->$key = $field;
        }
        $session->save();

        return redirect()->back();
    }

    public function add()
    {
        $fields = MizSession::getAllFields();
        $languages = MizLanguage::all();

        return view('miz.add-session-form')->with([
            'fields' => $fields,
            'languages' => $languages,
        ]);
    }

    public function postAdd(Request $request)
    {
        $data = MyRequest::all($request);
        $session = new MizSession($data['info']);
        $session->save();

        return redirect()->route('miz.sessions.view', ['session' => $session->id]);
    }

    public function all($type = null)
    {
        if ($type != null) {
            $publications = Publication::where('type', $type)->get();
        } else {
            $publications = Publication::all();
        }

        return view('publications.all-publications-list')->with([
            'publications' => $publications
        ]);
    }

    public function addFile(Request $request, MizSession $session)
    {
        $file = new MizFiles();
        $file->link = $session->storeFile($request->file('addFiles.file'));
        $file->name = $request->file('addFiles.file')->getClientOriginalName();
        $file->is_cover = $request->get('addFiles')['is_cover'] ?? false;
        $file->session_id = $session->id;
        $file->save();

        return redirect()->back();
    }

    public function deleteFile(MizFiles $file)
    {
        $file->delete();

        return redirect()->back();
    }

    public function downloadFile(MizFiles $file)
    {
        return Storage::disk('files')->download($file->link);
    }

    public function getAllEvaluations(MizSession $session)
    {
        $session->load(['evaluations']);
        $stats = Evaluation::getstat($session->evaluations);
        $stats['session'] = $session;

        return view('miz.session-all-evaluations')->with($stats);
    }

    public function getEvaluation(Evaluation $evaluation)
    {
        return view('miz.session-update-evaluation')->with([
            'evaluation' => $evaluation,
        ]);
    }

    public function addEvaluation(Request $request, MizSession $session)
    {
        $evaluation = new Evaluation();
        foreach ($request->get('addEvaluation') as $key => $value) {
            $evaluation->$key = $value;
        }
        $evaluation->session_id = $session->id;
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
        $languages = MizLanguage::all();
        return view('miz.session-bazkhord-goroohi')->with(
            [
                'languages' => $languages
            ]
        );
    }

    public function postBazkhordGoroohi(Request $request)
    {
        $sessions = MizSession::with('evaluations')->where('language_id', $request->get('language_id'));
        if ($request->get('shomare_az')) {
            $sessions->where('shomare', '>=', $request->get('shomare_az'));
        }
        if ($request->get('shomare_ta')) {
            $sessions->where('shomare', '<', $request->get('shomare_ta'));
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
        $sessions = $sessions->get();
        $evaluations = [];
        $selectedSessions = [];

        foreach ($sessions as $session) {
            if ($needMianginCheck) {
                $stat = Evaluation::getstat($session->evaluations);
                if ($stat['average']['kol'] >= $min && $stat['average']['kol'] <= $max) {
                    $selectedSessions[] = $session;
                } else {
                    continue;
                }
            } else {
                $selectedSessions[] = $session;
            }
            foreach ($session->evaluations as $evaluation) {
                $evaluations[] = $evaluation;
            }
        }

        $stats = Evaluation::getstat($evaluations);
        $stats['sessions'] = $selectedSessions;

        return view('miz.session-bazkhord-goroohi-result')->with($stats);
    }

    public function getContentsView(MizSession $session)
    {
        $session->load(['files']);
        return view('miz.fileContents')->with([
            'session' => $session,
        ]);
    }

    public function getMembers(MizLanguage $language)
    {
        $members = $language->members;

        return view('miz.language-members')->with([
            'members' => $members,
            'language' => $language,
        ]);
    }

    public function postMembers(Request $request, MizLanguage $language)
    {
        $member = new MizLanguageMember($request->get('addMember'));

        $language->members()->save($member);

        return redirect()->back();
    }

    public function deleteMember(MizLanguageMember $member)
    {
        $member->delete();

        return redirect()->back();
    }

    public function getSessionMembers(MizSession $session)
    {
        $members = $session->members;
        $permanentMembers = $session->language->members;

        return view('miz.session-members')->with([
            'members' => $members,
            'permanentMembers' => $permanentMembers,
            'session' => $session,
        ]);
    }

    public function postVariableMembers(Request $request, MizSession $session)
    {
        $member = new MizSessionMember(MyRequest::get($request, 'addMember'));

        $session->members()->save($member);

        return redirect()->back();
    }

    public function postPermanentMembers(Request $request, MizSession $session)
    {
        $memberID = $request->get('addPermanentMember');
        $member = MizLanguageMember::find($memberID);
        $mizSessionMember = new MizSessionMember($member->only(['name', 'madrak', 'sazman_matbooe', 'role']));

        $session->members()->save($mizSessionMember);

        return redirect()->back();
    }

    public function deleteSessionMember(MizSessionMember $member)
    {
        $member->delete();

        return redirect()->back();
    }

    public function getUpdateMember(MizSessionMember $member)
    {
        return view('miz.session-update-member')->with([
            'member' => $member,
        ]);
    }

    public function postUpdateMember(Request $request, MizSessionMember $member)
    {
        foreach (MyRequest::get($request, 'addMember') as $key => $value) {
            $member->$key = $value;
        }
        $member->save();

        return redirect()->back();
    }

    public function updateLanguage(MizLanguage $language)
    {
        return view('miz.update-language')->with([
            'language' => $language,
        ]);
    }

    public function postUpdateLanguage(Request $request, MizLanguage $language)
    {
        $language->language = $request->get('data')['language'];
        $language->save();
        return redirect()->route('miz.languages.add');
    }
}
