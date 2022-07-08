<?php

namespace App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyRequest
{
    public static function all(Request $request, $keys = null)
    {
        $original = $request->all($keys);
        $simpleArray = false;
        foreach ($original as $key => $value) {
            if (is_array($value)) {
                $original[$key] = Controller::convertDates($value);
            } else {
                $simpleArray = true;
            }
        }

        if ($simpleArray) {
            $original = Controller::convertDates($original);
        }

        return $original;
    }

    public static function get(Request $request, string $key, $default = null)
    {
        $original = $request->get($key, $default);
        if (is_array($original)) {
            $original = Controller::convertDates($original);
        }

        return $original;
    }
}
