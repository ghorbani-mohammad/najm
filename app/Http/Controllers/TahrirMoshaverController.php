<?php

namespace App\Http\Controllers;

use App\Models\HeyatTahrir;
use App\Models\MoshaverElmi;
use App\Models\Publication;
use App\MyRequest;
use Illuminate\Http\Request;

class TahrirMoshaverController extends Controller
{
    public function addPersonToTahrir(Publication $publication, Request $request)
    {
        $data = MyRequest::all($request);
        $person = new HeyatTahrir();
        $person->name = $data['addTahrir']['name'];
        $publication->tahrir()->save($person);

        return redirect()->back();
    }

    public function deletePersonFromTahrir(HeyatTahrir $person)
    {
        $person->delete();

        return redirect()->back();
    }

    public function addPersonToMoshaver(Publication $publication, Request $request)
    {
        $data = MyRequest::all($request);
        $person = new MoshaverElmi();
        $person->name = $data['addMoshaver']['name'];
        $publication->tahrir()->save($person);

        return redirect()->back();
    }

    public function deletePersonFromMoshaver(MoshaverElmi $person)
    {
        $person->delete();

        return redirect()->back();
    }
}
