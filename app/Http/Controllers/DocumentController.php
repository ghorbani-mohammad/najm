<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use App\Models\Personnel;
use App\MyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function addDocument(Personnel $person, Request $request)
    {
        $data = MyRequest::all($request);
        $document = new Documents();
        $document->title = $data['addDocument']['title'];
        $document->link = $person->storeFile($data['addDocumentFiles']['file'], 'documents');
        $person->documents()->save($document);

        return redirect()->back();
    }

    public function deleteDocument(Documents $document)
    {
        $document->delete();

        return redirect()->back();
    }

    public function downloadDocument(Documents $document)
    {
        return Storage::disk('files')->download($document->link);
    }

}
