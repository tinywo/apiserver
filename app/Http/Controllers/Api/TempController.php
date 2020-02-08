<?php

namespace App\Http\Controllers\Api;

use App\Data;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class TempController extends Controller
{
    public function avgTemp7day()
    {
        $data = array();
        for ($i = 0; $i < 7; $i++) {
            $data[$i] = Data::query()
                ->selectRaw('avg(temp) as temp')
                ->whereDate('created', Carbon::parse('-' . $i . ' days')->toDateString())
                ->get();
        }
        return $data;
    }
}
