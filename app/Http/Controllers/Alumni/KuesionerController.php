<?php

namespace App\Http\Controllers\Alumni;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pertanyaan;
use App\Models\JawabanKuesioner;
use Illuminate\Support\Facades\Auth;

class KuesionerController extends Controller
{
    public function index()
    {
        $pertanyaan = Pertanyaan::all();
        return view('alumni.kuesioner.index', compact('pertanyaan'));
    }

    public function store(Request $request)
    {
        foreach ($request->jawaban as $pertanyaan_id => $jawaban) {
            JawabanKuesioner::create([
                'user_id' => Auth::user()->id,
                'pertanyaan_id' => $pertanyaan_id,
                'jawaban' => $jawaban,
            ]);
        }

        return redirect()->route('alumni.dashboard')->with('success', 'Kuesioner berhasil dikirim.');
    }
}
