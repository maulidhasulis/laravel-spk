<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::all();
        return view('kriterias.index', compact('kriterias'));
    }

    public function create()
    {
        return view('kriterias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'weight' => 'required|numeric',
            'type' => 'required|in:benefit,cost',
        ]);

        Kriteria::create($request->all());
        return redirect()->route('kriterias.index')->with('success', 'Kriteria created successfully.');
    }

    public function edit(Kriteria $kriteria)
    {
        return view('kriterias.edit', compact('kriteria'));
    }

    public function update(Request $request, Kriteria $kriteria)
    {
        $request->validate([
            'name' => 'required',
            'weight' => 'required|numeric',
            'type' => 'required|in:benefit,cost',
        ]);

        $kriteria->update($request->all());
        return redirect()->route('kriterias.index')->with('success', 'Kriteria updated successfully.');
    }

    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete();
        return redirect()->route('kriterias.index')->with('success', 'Kriteria deleted successfully.');
    }
}
