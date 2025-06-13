@extends('layouts.alumni')

@section('content')
    <h2 class="text-2xl font-bold mb-4 text-gray-800">Selamat Datang, {{ Auth::user()->name }}!</h2>

    <div class="bg-white rounded-lg shadow-md p-6">
        <p class="text-gray-700 text-lg mb-4">
            Ini adalah halaman utama untuk alumni. Silakan gunakan menu di sebelah kiri untuk mengisi kuesioner dan mengelola riwayat pekerjaanmu.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
            <div class="bg-blue-100 p-4 rounded-lg flex items-center shadow">
                <i class="fas fa-question-circle fa-2x text-blue-600 mr-4"></i>
                <div>
                    <p class="text-blue-700 font-semibold">Kuesioner</p>
                    <small>Isi kuesioner tracer studi alumni</small>
                </div>
            </div>
            <div class="bg-green-100 p-4 rounded-lg flex items-center shadow">
                <i class="fas fa-briefcase fa-2x text-green-600 mr-4"></i>
                <div>
                    <p class="text-green-700 font-semibold">Riwayat Pekerjaan</p>
                    <small>Tambah & lihat riwayat karirmu</small>
                </div>
            </div>
        </div>
    </div>
@endsection
