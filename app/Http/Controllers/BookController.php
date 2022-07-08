<?php

namespace App\Http\Controllers;

use App\Models\Maghale;
use App\Models\Book;
use App\Models\BookFiles;
use App\Models\Publication;
use App\MyRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Morilog\Jalali\Jalalian;

class BookController extends Controller
{
    public function view(Book $book)
    {
        $fields = Book::getAllFields($book->type);
        $types = Book::getAllTypes();
        $book->load(['files']);
        return view('books.update-book-form')->with([
            'book' => $book,
            'fields' => $fields,
            'types' => $types,
        ]);
    }

    public function update(Book $book, Request $request)
    {
        $data = MyRequest::all($request);
        foreach ($data['info'] as $key => $field) {
            $book->$key = $field;
        }
        $book->save();

        return redirect()->back();
    }

    public function add()
    {
        $fields = Book::getAllFields();
        $types = Book::getAllTypes();

        return view('books.add-book-form')->with([
            'fields' => $fields,
            'types' => $types,
        ]);
    }

    public function postAdd(Request $request)
    {
        $data = MyRequest::all($request);
        $book = new Book($data['info']);
        $book->save();

        return redirect()->route('book.view', ['book' => $book->id]);
    }

    public function all($type = null)
    {
        if ($type != null) {
            $books = Book::where('type', $type)->get();
        } else {
            $books = Book::all();
        }
        $total = count($books);
        $a = Jalalian::now();
        $start = $a->subDays($a->getDay()-1)->toCarbon();
        $month = $start->startOfMonth();
        if ($a->getMonth() != 1) {
            $a = $a->subMonths($a->getMonth()-1);
        }
        $start = $a->toCarbon();
        $year = $start->startOfYear();
        $yearTotal = $books->where('enteshar_tarikh', '>=', $year)->count();
        $monthTotal = $books->where('enteshar_tarikh', '>=', $month)->count();
        $lastThree = $books->sortByDesc('id')->take(3);

        return view('books.all-books-list')->with([
            'books' => $books,
            'total' => $total,
            'yearTotal' => $yearTotal,
            'monthTotal' => $monthTotal,
            'lastThree' => $lastThree,
        ]);
    }

    public function addFile(Request $request, Book $book)
    {
        $file = new BookFiles();
        $file->link = $book->storeFile($request->file('addFiles.file'));
        $file->name = $request->file('addFiles.file')->getClientOriginalName();
        $file->is_cover = $request->get('addFiles')['is_cover'] ?? false;
        $file->book_id = $book->id;
        $file->save();

        return redirect()->back();
    }

    public function deleteFile(BookFiles $file)
    {
        $file->delete();

        return redirect()->back();
    }

    public function downloadFile(BookFiles $file)
    {
        return Storage::disk('files')->download($file->link);
    }

    public function getContentsView(Book $book)
    {
        $book->load(['files']);
        return view('books.fileContents')->with([
            'book' => $book,
        ]);
    }

    public function getSearch()
    {
        return view('books.search');
    }

    public function postSearch(Request $request)
    {
        $q = $request->get('search')['q'] ?? null;
        $query = Book::query();
        $fields = [
            'title',
            'title_en',
            'nobate_chap',
            'sal',
            'shomaregan',
            'shabak',
            'fipa',
            'tahrir_moallef',
            'tahrir_nazer_ali',
            'tahrir_nazer_elmi',
            'tahrir_nazer_fanni',
            'tahrir_virastar',
            'tahrir_nemoone_khan',
            'tahrir_type_safhe_arayi',
            'tahrir_tarrah_jeld',];
        foreach ($fields as $field) {
            $query->orWhere($field, 'like', "%{$q}%");
        }

        $books = $query->get();
        //todo: dates
        $data = MyRequest::get($request, 'search');
        if ($data['date_from'] ?? false) {
            $books->where('enteshar_tarikh', '>=', $data['date_from']);
        }
        if ($data['date_to'] ?? false) {
            $books->where('enteshar_tarikh', '<=', $data['date_to']);
        }
        $total = count($books);
        $a = Jalalian::now();
        $start = $a->subDays($a->getDay()-1)->toCarbon();
        $month = $start->startOfMonth();
        if ($a->getMonth() != 1) {
            $a = $a->subMonths($a->getMonth()-1);
        }
        $start = $a->toCarbon();
        $year = $start->startOfYear();
        $yearTotal = $books->where('enteshar_tarikh', '>=', $year)->count();
        $monthTotal = $books->where('enteshar_tarikh', '>=', $month)->count();
        $lastThree = $books->sortByDesc('id')->take(4);

        return view('books.all-books-list')->with([
            'books' => $books,
            'total' => $total,
            'yearTotal' => $yearTotal,
            'monthTotal' => $monthTotal,
            'lastThree' => $lastThree,
        ]);
    }
}
