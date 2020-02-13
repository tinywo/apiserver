<?php

namespace App\Http\Controllers\App;

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
        $arr_rev = array_reverse($data);    //翻转数组
        $categories = array();
        $series_data = array();
        for ($i = 0; $i < 7; $i++) {
            array_push($categories, $arr_rev[$i]['date']);
            array_push($series_data, $arr_rev[$i]['temp']);
        }
        $data_arr['categories'] = $categories;
        $data_arr['series'] = array(['name' => '近7日平均温度', 'data' => $series_data],);
        return $data_arr;
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
