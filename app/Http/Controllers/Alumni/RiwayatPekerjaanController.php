<?php

namespace App\Http\Controllers\Alumni;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RiwayatPekerjaan;

class RiwayatPekerjaanController extends Controller
{
    public function index()
    {
        $riwayats = RiwayatPekerjaan::where('user_id', Auth::id())->get();
        return view('alumni.riwayat.index', compact('riwayats'));
    }

    public function create()
    {
        return view('alumni.riwayat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required',
            'posisi' => 'required',
            'lokasi' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'nullable|date',
        ]);

        RiwayatPekerjaan::create([
            'user_id' => Auth::id(),
            'nama_perusahaan' => $request->nama_perusahaan,
            'posisi' => $request->posisi,
            'lokasi'=>$request->lokasi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_berakhir' => $request->tanggal_berakhir,  // Pastikan ini dikirim dengan benar
        ]);

        return redirect()->route('alumni.riwayat.index')->with('success', 'Data berhasil disimpan.');
    }

    
    public function edit($id)
    {
        $riwayat = RiwayatPekerjaan::findOrFail($id);

        if ($riwayat->user_id !== Auth::id()) {
            abort(403);
        }

        return view('alumni.riwayat.edit', compact('riwayat'));
    }

    public function update(Request $request, $id)
    {
        $riwayat = RiwayatPekerjaan::findOrFail($id);

        if ($riwayat->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'nama_perusahaan' => 'required',
            'posisi' => 'required',
            'lokasi' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'nullable|date|after_or_equal:tanggal_mulai',
        ]);

        $riwayat->update([
            'nama_perusahaan' => $request->nama_perusahaan,
            'posisi' => $request->posisi,
            'lokasi' => $request->lokasi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_berakhir' => $request->tanggal_berakhir,
        ]);

        return redirect()->route('alumni.riwayat.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $riwayat = RiwayatPekerjaan::findOrFail($id);

        if ($riwayat->user_id !== Auth::id()) {
            abort(403);
        }

        $riwayat->delete();

        return redirect()->route('alumni.riwayat.index')->with('success', 'Data berhasil dihapus.');
    }


}
