<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RiwayatPekerjaan;
use App\Models\User;

class RiwayatAlumniController extends Controller
{
    public function index()
    {
        $riwayats = RiwayatPekerjaan::with('user')->latest()->get();
        return view('admin.riwayat.index', compact('riwayats'));
    }
}
