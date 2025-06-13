@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-bold mb-6 text-center">Selamat Datang Admin di Sistem Tracer Study Alumni</h2> <br>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        {{-- Widget 1: Total Alumni --}}
        <div class="bg-white p-6 rounded shadow text-center">
            <div class="text-blue-600 text-3xl mb-2">
                <i class="fas fa-users"></i>
            </div>
            <div class="text-xl font-semibold">{{ $totalAlumni }}</div>
            <div class="text-gray-600">Total Alumni</div>
        </div>

        {{-- Widget 2: Sudah Bekerja --}}
        <div class="bg-white p-6 rounded shadow text-center">
            <div class="text-blue-700 text-3xl mb-2">
                <i class="fas fa-briefcase"></i>
            </div>
            <div class="text-xl font-semibold">{{ $sudahBekerja }}</div>
            <div class="text-gray-600">Sudah Bekerja</div>
        </div>

        {{-- Widget 3: Belum Bekerja --}}
        <div class="bg-white p-6 rounded shadow text-center">
            <div class="text-red-600 text-3xl mb-2">
                <i class="fas fa-user-times"></i>
            </div>
            <div class="text-xl font-semibold">{{ $belumBekerja }}</div>
            <div class="text-gray-600">Belum Bekerja</div>
        </div>

        {{-- Widget 4: Kuesioner Terisi --}}
        <div class="bg-white p-6 rounded shadow text-center">
            <div class="text-green-600 text-3xl mb-2">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="text-xl font-semibold">{{ $totalKuesioner }}</div>
            <div class="text-gray-600">Sudah Mengisi Kuesioner</div>
        </div>
        
        {{-- Widget 5: Belum Isi Kuesioner --}}
        <div class="bg-white p-6 rounded shadow text-center">
            <div class="text-purple-600 text-3xl mb-2">
                <i class="fas fa-file-alt"></i>
            </div>
            <div class="text-xl font-semibold">{{ $belumKuesioner }}</div>
            <div class="text-gray-600">Belum Mengisi Kuesioner</div>
        </div>

        {{-- Widget 6: Riwayat Pekerjaan --}}
        <!-- <div class="bg-white p-6 rounded shadow text-center">
            <div class="text-yellow-600 text-3xl mb-2">
                <i class="fas fa-briefcase"></i>
            </div>
            <div class="text-xl font-semibold">{{ $totalRiwayat }}</div>
            <div class="text-gray-600">Riwayat Pekerjaan</div>
        </div> -->

    </div>
@endsection
