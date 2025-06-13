<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumni;
use Illuminate\Support\Facades\Storage;

class AlumniController extends Controller
{
    public function index()
    {
        $alumni = \App\Models\Alumni::all(); // ambil semua data alumni
        return view('admin.alumni.index', compact('alumni'));
    }

    public function create()
    {
        return view('admin.alumni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nim' => 'required|string|max:100|unique:alumnis',
            'prodi' => 'required|string',
            'tahun_lulus' => 'required|digits:4',
            'email' => 'required|email|unique:alumnis',
            'no_hp' => 'required|string|max:15',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('alumni_foto', 'public');
        }

        Alumni::create($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Alumni berhasil ditambahkan');
    }

    public function show($id)
    {
        $alumni = \App\Models\Alumni::findOrFail($id);
        return view('admin.alumni.show', compact('alumni'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $alumni = \App\Models\Alumni::findOrFail($id);
        return view('admin.alumni.edit', compact('alumni'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nim' => 'required',
            'prodi' => 'required',
            'tahun_lulus' => 'required|numeric',
            'email' => 'required|email',
            'no_hp' => 'required',
        ]);

        $alumni = \App\Models\Alumni::findOrFail($id);

        $data = $request->all();

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($alumni->foto) {
                Storage::disk('public')->delete($alumni->foto);
            }

            $data['foto'] = $request->file('foto')->store('alumni_foto', 'public');
        }

        $alumni->update($data);

        return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $alumni = \App\Models\Alumni::findOrFail($id);
        $alumni->delete();

        return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil dihapus!');
    }

}
