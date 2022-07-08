<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Morilog\Jalali\Jalalian;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    static function convertDates($data) {
        foreach ($data as $key => $value) {
            if ((str_contains($key, 'tarikh') || str_contains($key, 'date')) && str_contains($value, '/')) {
                $data[$key] = strtr($data[$key],
                    array('۰' => '0', '۱' => '1', '۲' => '2', '۳' => '3', '۴' => '4', '۵' => '5', '۶' => '6', '۷' => '7', '۸' => '8', '۹' => '9',
                        '٠' => '0', '١' => '1', '٢' => '2', '٣' => '3', '٤' => '4', '٥' => '5', '٦' => '6', '٧' => '7', '٨' => '8', '٩' => '9'));
                try{
                    $data[$key] =Jalalian::fromFormat("Y/m/d", $data[$key])->toCarbon();
                } catch (\Exception $e) {
                    dd("ex", $key, $value, $data[$key], $e);
                }
            }
        }

        return $data;
    }
}
