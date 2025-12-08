<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use Illuminate\Support\Facades\Validator;

class TopsisController extends Controller
{
    // tampilkan view utama
    public function index()
    {
        return view('topsis');
    }

    // simpan kandidat (AJAX)
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'exp'  => 'required|integer|min:0|max:50',
            'edu'  => 'required|integer|min:1|max:10',
            'tech' => 'required|integer|min:1|max:10',
            'soft' => 'required|integer|min:1|max:10',
        ]);

        if ($v->fails()) {
            return response()->json(['errors'=>$v->errors()], 422);
        }

        $candidate = Candidate::create($request->only(['name','exp','edu','tech','soft']));

        return response()->json(['message'=>'Kandidat berhasil ditambahkan','candidate'=>$candidate]);
    }

    // hitung TOPSIS dari data di DB dan kembalikan ranking (AJAX)
    public function calculate()
    {
        $candidates = Candidate::all()->toArray();

        if (count($candidates) < 2) {
            return response()->json(['error'=>'Tambahkan minimal 2 kandidat'], 422);
        }

        // Susun matriks keputusan (array of arrays)
        $matrix = array_map(function($c){
            // urut: exp, edu, tech, soft
            return [
                floatval($c['exp']),
                floatval($c['edu']),
                floatval($c['tech']),
                floatval($c['soft'])
            ];
        }, $candidates);

        // Bobot kriteria (ubah sesuai kebutuhan)
        $weights = [0.3, 0.2, 0.3, 0.2];

        // 1) Normalisasi: r_ij = x_ij / sqrt(sum(x_ij^2))
        $cols = count($matrix[0]);
        $denom = array_fill(0, $cols, 0.0);
        foreach ($matrix as $row) {
            for ($j=0;$j<$cols;$j++) $denom[$j] += $row[$j] * $row[$j];
        }
        for ($j=0;$j<$cols;$j++) $denom[$j] = sqrt($denom[$j]) ?: 1.0;

        $normMatrix = [];
        foreach ($matrix as $row) {
            $normRow = [];
            for ($j=0;$j<$cols;$j++) $normRow[] = $row[$j] / $denom[$j];
            $normMatrix[] = $normRow;
        }

        // 2) Matriks terbobot: v_ij = w_j * r_ij
        $weighted = [];
        foreach ($normMatrix as $row) {
            $wRow = [];
            for ($j=0;$j<$cols;$j++) $wRow[] = $row[$j] * $weights[$j];
            $weighted[] = $wRow;
        }

        // 3) Tentukan ideal positif (max) dan ideal negatif (min)
        $idealPos = [];
        $idealNeg = [];
        for ($j=0;$j<$cols;$j++) {
            $colValues = array_column($weighted, $j);
            $idealPos[$j] = max($colValues);
            $idealNeg[$j] = min($colValues);
        }

        // 4) Hitung jarak ke ideal positif & negatif
        $dPos = [];
        $dNeg = [];
        foreach ($weighted as $i => $row) {
            $sumPos = 0.0;
            $sumNeg = 0.0;
            for ($j=0;$j<$cols;$j++) {
                $sumPos += pow($row[$j] - $idealPos[$j], 2);
                $sumNeg += pow($row[$j] - $idealNeg[$j], 2);
            }
            $dPos[$i] = sqrt($sumPos);
            $dNeg[$i] = sqrt($sumNeg);
        }

        // 5) Closeness coefficient
        $results = [];
        foreach ($candidates as $i => $c) {
            $closeness = ($dPos[$i] + $dNeg[$i]) == 0 ? 0 : ($dNeg[$i] / ($dPos[$i] + $dNeg[$i]));
            $results[] = [
                'id' => $c['id'],
                'name' => $c['name'],
                'exp' => $c['exp'],
                'edu' => $c['edu'],
                'tech'=> $c['tech'],
                'soft'=> $c['soft'],
                'closeness' => round($closeness, 6)
            ];
        }

        // Urutkan menurun berdasarkan closeness
        usort($results, function($a,$b){ return $b['closeness'] <=> $a['closeness']; });

        return response()->json(['ranking' => $results]);
    }
}
