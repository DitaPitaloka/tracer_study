<?php

namespace App\Http\Controllers\Admin;

use App\Models\GrupKuesioner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GrupKuesionerController extends Controller
{
    public function index()
    {
        $grupKuesioner = GrupKuesioner::latest()->get();
        return view('admin.grup-kuesioner.index', compact('grupKuesioner'));
    }

    public function create()
    {
        return view('admin.grup-kuesioner.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nama_grup' => 'required|string|max:255',
        'deskripsi' => 'required|string|max:255',
        'tanggal_mulai' => 'required|date',
        'tanggal_berakhir' => 'required|date|after_or_equal:tanggal_mulai',
    ]);

    GrupKuesioner::create([
        'nama_grup' => $request->nama_grup,
        'deskripsi' => $request->deskripsi,
        'tanggal_mulai' => $request->tanggal_mulai,
        'tanggal_berakhir' => $request->tanggal_berakhir,
    ]);

    return redirect()->route('grup-kuesioner.index')->with('success', 'Grup kuesioner berhasil ditambahkan.');
}

public function update(Request $request, GrupKuesioner $grupKuesioner)
{
    $request->validate([
        'nama_grup' => 'required|string|max:255',
        'deskripsi' => 'required|string|max:255',
        'tanggal_mulai' => 'required|date',
        'tanggal_berakhir' => 'required|date|after_or_equal:tanggal_mulai',
    ]);

    $grupKuesioner->update([
        'nama_grup' => $request->nama_grup,
        'deskripsi' => $request->deskripsi,
        'tanggal_mulai' => $request->tanggal_mulai,
        'tanggal_berakhir' => $request->tanggal_berakhir,
    ]);

    return redirect()->route('grup-kuesioner.index')->with('success', 'Grup kuesioner berhasil diperbarui.');
}



public function edit(GrupKuesioner $grupKuesioner)
{
    return view('admin.grup-kuesioner.edit', compact('grupKuesioner'));
}


    public function destroy(GrupKuesioner $grupKuesioner)
    {
        $grupKuesioner->delete();

        return redirect()->route('grup-kuesioner.index')->with('success', 'Grup kuesioner berhasil dihapus.');
    }
}
