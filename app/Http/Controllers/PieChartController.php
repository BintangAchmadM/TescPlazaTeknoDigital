<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Carbon\Carbon;

class PieChartController extends Controller
{
    public function index()
    {
        $records = Company::select(
            \DB::raw("COUNT(*) as count"),
            'sumber'
        )
        ->where('created_at', '>', Carbon::today()->subDay(6))
        ->groupBy('sumber')
        ->get();

        $data = [];
        $sources = ['whatsapp', 'instagram', 'iklan', 'facebook'];

        foreach ($sources as $source) {
            $data['labels'][] = $source;
            $data['data'][] = $records->where('sumber', $source)->pluck('count')->first();
        }

        return view('chart', compact('data'));
    }
}
