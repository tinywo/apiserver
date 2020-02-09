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
            $date = Carbon::parse('-' . $i . ' days')->toDateString();
            $temp = Data::query()
                ->selectRaw('avg(temp) as temp')
                ->whereDate('created', $date)
                ->get();
            $data[$i] = $temp[0];
            $data[$i]['date'] = $date;
        }
        return array_reverse($data);    //翻转数组
    }

    public function avgHum7day()
    {
        $data = array();
        for ($i = 0; $i < 7; $i++) {
            $date = Carbon::parse('-' . $i . ' days')->toDateString();
            $temp = Data::query()
                ->selectRaw('avg(hum) as hum')
                ->whereDate('created', $date)
                ->get();
            $data[$i] = $temp[0];
            $data[$i]['date'] = $date;
        }
        return array_reverse($data);    //翻转数组
    }
}
