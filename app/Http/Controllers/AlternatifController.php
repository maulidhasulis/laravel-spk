<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Kriteria;

class AlternatifController extends Controller
{
    public function index()
    {
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all();
        return view('alternatifs.index', compact('alternatifs','kriterias'));
    }

    public function create()
    {
        $kriterias = Kriteria::all();
        return view('alternatifs.create', compact('kriterias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'kriterias.*' => 'required|integer',
        ]);

        $alternatif = Alternatif::create($request->only('name'));

        foreach ($request->kriterias as $kriteria_id => $value) {
            $alternatif->kriterias()->attach($kriteria_id, ['value' => $value]);
        }

        return redirect()->route('alternatifs.index')->with('success', 'Alternatif created successfully.');
    }

    public function edit(Alternatif $alternatif)
    {
        $kriterias = Kriteria::all();
        return view('alternatifs.edit', compact('alternatif', 'kriterias'));
    }

    public function update(Request $request, Alternatif $alternatif)
    {
        $request->validate([
            'name' => 'required',
            'kriterias.*' => 'required|integer',
        ]);

        $alternatif->update($request->only('name'));

        $alternatif->kriterias()->detach();
        foreach ($request->kriterias as $kriteria_id => $value) {
            $alternatif->kriterias()->attach($kriteria_id, ['value' => $value]);
        }

        return redirect()->route('alternatifs.index')->with('success', 'Alternatif updated successfully.');
    }

    public function destroy(Alternatif $alternatif)
    {
        $alternatif->delete();
        return redirect()->route('alternatifs.index')->with('success', 'Alternatif deleted successfully.');
    }
}
