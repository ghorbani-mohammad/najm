<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Evaluation;
use App\Models\MizLanguage;
use App\Models\MizSession;
use App\Models\Personnel;
use App\Models\Project;
use App\Models\Publication;
use App\MyRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class ReportsController extends Controller
{
    public function products()
    {
        $products = [
            "publications" => Publication::getAllTypes(),
            // "books" => Book::getAllTypes(),
            "projects" => Project::getAllTypes(),
            "miz" => MizLanguage::pluck('language', 'id')->toArray(),
        ];

        return view('reports.products')->with(compact('products'));
    }

    public function postProducts(Request $request)
    {
        $data = MyRequest::all($request);
        $category = 'محصولات';
        $type = '';
        switch ($data['category']) {
            case 'publications':
                $category = 'نشریات';
                $type = Publication::getAllTypes()[$data['product']];
                $column = 'shomare_mosalsal';
                $name = 'شماره مسلسل';
                $products = Publication::where('type', $data['product']);
                if ($data['date_from'] ?? false) {
                    $products->where('tarikhe_enteshar', '>=', $data['date_from']);
                }
                if ($data['date_to'] ?? false) {
                    $products->where('tarikhe_enteshar', '<=', $data['date_to']);
                }
                break;
            case 'books':
                $category = 'کتب';
                $type = Book::getAllTypes()[$data['product']];
                $column = 'title';
                $name = 'عنوان';
                $products = book::query();
                $products->where('type', $data['product']);
                if ($data['date_from'] ?? false) {
                    $products->where('enteshar_tarikh', '>=', $data['date_from']);
                }
                if ($data['date_to'] ?? false) {
                    $products->where('enteshar_tarikh', '<=', $data['date_to']);
                }
                break;
            case 'projects':
                $category = 'پروژه‌های';
                $type = Project::getAllTypes()[$data['product']];
                $column = 'name';
                $name = 'عنوان';
                $products = Project::where('type', $data['product']);
                if ($data['date_from'] ?? false) {
                    $products->where('start_date', '>=', $data['date_from']);
                }
                if ($data['date_to'] ?? false) {
                    $products->where('start_date', '<=', $data['date_to']);
                }
                break;
            case 'miz':
                $category = 'میزهای';
                $type = MizLanguage::find([$data['product']])->first()->language;
                $column = 'shomare';
                $name = 'شماره جلسه';
                $products = MizSession::query();
                $products->where('language_id', $data['product']);
                if ($data['date_from'] ?? false) {
                    $products->where('tarikh', '>=', $data['date_from']);
                }
                if ($data['date_to'] ?? false) {
                    $products->where('tarikh', '<=', $data['date_to']);
                }
                break;
            default:
                return redirect()->back();
        }
        $datesText = '';
        if ($data['date_from'] ?? false) {
            $timeFrame = Jalalian::fromCarbon($data['date_from']);
            $datesText .= "از  {$timeFrame->getYear()}/{$timeFrame->getMonth()}/{$timeFrame->getDay()} ";
        }
        if ($data['date_to'] ?? false) {
            $timeFrame = Jalalian::fromCarbon($data['date_to']);
            $datesText .= " تا {$timeFrame->getYear()}/{$timeFrame->getMonth()}/{$timeFrame->getDay()} ";
        }
        $data = [];
        foreach ($products->get() as $product) {
            $stat = Evaluation::getstat($product->evaluations);
            $data[] = [
                $name => $product->$column,
                'میانگین' => $stat['average']['kol'],
            ];
        }

        $title = "نمودار مقایسه $category $type $datesText(میانگین کل/$name)";
        return view('reports.products-result', compact('data', 'name', 'title'));
    }

    public function personnel(Request $request)
    {
        return view('reports.personnel');
    }

    public function postPersonnel(Request $request)
    {
        $data = MyRequest::all($request);
        $personnel = Personnel::all();
        $count = [];
        $datesText = '';
        if ($data['date_from'] ?? false) {
            $timeFrame = Jalalian::fromCarbon($data['date_from']);
            $datesText .= "از  {$timeFrame->getYear()}/{$timeFrame->getMonth()}/{$timeFrame->getDay()} ";
        }
        if ($data['date_to'] ?? false) {
            $timeFrame = Jalalian::fromCarbon($data['date_to']);
            $datesText .= " تا {$timeFrame->getYear()}/{$timeFrame->getMonth()}/{$timeFrame->getDay()} ";
        }
        foreach ($personnel as $person) {
            $count[$person->name] = $person->publications($data['date_from'], $data['date_to'])['total'];
        }

        arsort($count);
        if ($data['limit'] > 0) {
            $count = array_slice($count, 0, $data['limit']);
        }
        $result = [];
        foreach ($count as $name => $total) {
            $result[] = compact('name', 'total');
        }
        $title = "نمودار مقایسه‌ی فعالیت همکاران  $datesText(تعداد کل نشریات و مقالات/نام)";

        return view('reports.personnel-result', compact('result', 'title'));
    }

    public function person()
    {
        return view('reports.person');
    }

    public function postPerson(Request $request)
    {
        $input = MyRequest::all($request);
        /** @var Personnel $person */
        $person = Personnel::where('name', 'like', "%{$input['name']}%")->first();
        if (is_null($person)){
            return redirect()->back()->with('message', 'همکار مورد نظر در سامانه پیدا نشد');
        }
        $publications = $person->publications($input['date_from'], $input['date_to']);
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
        // dump($data);
        asort($data);
        // dump($data);
        $result = [];
        $yAxis = [];
        $result2 = [];
        foreach ($data as $year => $records) {
            // dump($records);
            asort($records);
            // dd($records);
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
