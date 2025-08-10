<?php

namespace App\Http\Controllers\Director;

use Illuminate\Http\Request;
use App\Models\ScoringPeriod;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ScoreResultController extends Controller
{
    public function index(Request $request)
    {
        $termin = $request->input('termin');
        $tahun  = $request->input('tahun');

        $terminMap = [
            'januari-maret'   => ['januari', 'februari', 'maret'],
            'april-juni'      => ['april', 'mei', 'juni'],
            'juli-september'  => ['juli', 'agustus', 'september'],
            'oktober-desember'=> ['oktober', 'november', 'desember'],
        ];

        if (!$termin || !$tahun) {
            $lastPeriod = DB::table('scoring_period')
                ->select('bulan', 'tahun')
                ->orderBy('tahun', 'desc')
                ->orderByRaw("FIELD(bulan, 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember') DESC")
                ->first();

            if ($lastPeriod) {
                foreach ($terminMap as $key => $bulanList) {
                    if (in_array($lastPeriod->bulan, $bulanList)) {
                        $termin = $key;
                        break;
                    }
                }
                $tahun = $lastPeriod->tahun;
            }
        }

        $bulanFilter = $terminMap[$termin] ?? [];

        $rawData = DB::table('employee_scores')
            ->join('users', 'employee_scores.user_id', '=', 'users.id')
            ->join('scoring_period', 'employee_scores.scoring_period_id', '=', 'scoring_period.id')
            ->where('scoring_period.tahun', $tahun)
            ->whereIn('scoring_period.bulan', $bulanFilter)
            ->select(
                'users.id as user_id',
                'users.name as nama',
                'users.position as divisi',
                'scoring_period.bulan',
                DB::raw('SUM(employee_scores.score) as total_score')
            )
            ->groupBy('users.id', 'users.name', 'users.position', 'scoring_period.bulan')
            ->orderBy('users.id')
            ->get();

        $grouped = $rawData->groupBy('user_id')->map(function($items) use ($bulanFilter) {
            $row = [
                'nama'   => $items->first()->nama,
                'divisi' => $items->first()->divisi,
            ];
            $totalSum = 0;
            foreach ($bulanFilter as $bulan) {
                $score = $items->firstWhere('bulan', $bulan)->total_score ?? 0;
                $row[$bulan] = $score;
                $totalSum += $score;
            }
            $row['rata_rata'] = $totalSum != 0 ? round($totalSum / 3, 2) : 0;
            return $row;
        });

        $tahunList = DB::table('scoring_period')
            ->select('tahun')
            ->distinct()
            ->orderByDesc('tahun')
            ->pluck('tahun');

        return view('director.score_result', compact('grouped', 'termin', 'tahun', 'tahunList'));
    }
}
