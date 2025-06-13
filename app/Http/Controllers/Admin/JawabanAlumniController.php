<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pertanyaan;
use App\Models\JawabanKuesioner;

class JawabanAlumniController extends Controller
{
    public function index()
    {
        $alumni = User::where('role', 'alumni')->with(['jawabanKuesioner.pertanyaan'])->get();

        return view('admin.jawaban.index', compact('alumni'));
    }
}
