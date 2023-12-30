<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class BarChartController extends Controller
{
    public function index()
    {
        $data = Company::select(
            \DB::raw("COUNT(*) as count"),
            \DB::raw("YEAR(tanggal) as year")
        )
        ->groupBy('year')
        ->orderBy('year')
        ->get();

        $labels = $data->pluck('year');
        $dataset = $data->pluck('count');

        return view('bar-chart', compact('labels', 'dataset'));
    }
}
