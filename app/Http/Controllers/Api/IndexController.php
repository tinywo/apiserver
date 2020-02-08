<?php

namespace App\Http\Controllers\Api;

use App\Data;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $tableData = Data::query()
            ->selectRaw('avg(temp) as temp')
            ->get();
        return $tableData;
        //  select avg(temp) as temp from data;
    }
}
