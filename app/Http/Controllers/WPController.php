<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Kriteria;

class WPController extends Controller
{
    public function index()
    {
        $alternatifs = Alternatif::with('kriterias')->get();
        $kriterias = Kriteria::all();

        // Step 1: Normalisasi bobot kriteria
        $totalWeight = $kriterias->sum('weight');
        $normalizedWeights = $kriterias->mapWithKeys(function ($item) use ($totalWeight) {
            return [$item->id => $item->weight / $totalWeight];
        });

        // Step 2: Normalisasi nilai kriteria
        $normalizedValues = $alternatifs->mapWithKeys(function ($alternatif) use ($kriterias) {
            $normalized = [];
            foreach ($kriterias as $kriteria) {
                $value = $alternatif->kriterias->find($kriteria->id)->pivot->value;
                if ($kriteria->type == 'cost') {
                    $value = 1 / $value; // Normalisasi cost
                }
                $normalized[$kriteria->id] = $value;
            }
            return [$alternatif->id => $normalized];
        });

        // Step 3: Menghitung nilai preferensi setiap alternatif
        $vektors = $alternatifs->mapWithKeys(function ($alternatif) use ($normalizedValues, $normalizedWeights) {
            $product = 1;
            foreach ($normalizedWeights as $kriteriaId => $weight) {
                $value = $normalizedValues[$alternatif->id][$kriteriaId];
                $product *= pow($value, $weight);
            }
            return [$alternatif->id => $product];
        });

        // Normalisasi hasil akhir
        $sumTotal = $vektors->sum();
        $finalResults = $vektors->map(function ($value) use ($sumTotal) {
            return $value / $sumTotal;
        });

        // Menghitung peringkat
        $rankedResults = $finalResults->sortDesc()->mapWithKeys(function ($value, $key) {
            static $rank = 1;
            return [$key => ['value' => $value, 'rank' => $rank++]];
        });

        return view('wp.results', compact('rankedResults', 'vektors', 'alternatifs'));
    }
}
