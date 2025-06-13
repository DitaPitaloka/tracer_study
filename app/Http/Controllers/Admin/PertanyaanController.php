<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pertanyaan;
use App\Models\GrupKuesioner;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    public function index(Request $request)
    {
        $grupId = $request->get('grup');
        $grupKuesioners = GrupKuesioner::all();

        $pertanyaans = Pertanyaan::when($grupId, function ($query) use ($grupId) {
            return $query->where('grup_kuesioner_id', $grupId);
        })->with('grupKuesioner')->get();

        return view('admin.pertanyaan.index', compact('pertanyaans', 'grupKuesioners'));
    }

    public function create()
    {
        $grupKuesioners = GrupKuesioner::all();
        return view('admin.pertanyaan.create', compact('grupKuesioners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required|string|max:255',
            'grup_id' => 'required|exists:grup_kuesioners,id',
        ]);

        Pertanyaan::create([
            'pertanyaan' => $request->pertanyaan,
            'grup_kuesioner_id' => $request->grup_id,
        ]);

        return redirect()->route('pertanyaan.index')->with('success', 'Pertanyaan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pertanyaan = Pertanyaan::findOrFail($id);
        $grupKuesioners = \App\Models\GrupKuesioner::all(); // ambil semua grup
        return view('admin.pertanyaan.edit', compact('pertanyaan', 'grupKuesioners'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pertanyaan' => 'required|string|max:255',
            'grup_id' => 'required|exists:grup_kuesioners,id',
        ]);

        $pertanyaan = Pertanyaan::findOrFail($id);
        $pertanyaan->update([
            'pertanyaan' => $request->pertanyaan,
            'grup_kuesioner_id' => $request->grup_id,
        ]);

        return redirect()->route('pertanyaan.index')->with('success', 'Pertanyaan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pertanyaan = Pertanyaan::findOrFail($id);
        $pertanyaan->delete();

        return redirect()->route('pertanyaan.index')->with('success', 'Pertanyaan berhasil dihapus.');
    }
}
