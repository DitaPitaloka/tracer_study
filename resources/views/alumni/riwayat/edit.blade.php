@extends('layouts.alumni')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Edit Riwayat Pekerjaan</h2>

    <div class="bg-white p-6 rounded shadow-md">
        <form method="POST" action="{{ route('alumni.riwayat.update', $riwayat->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700">Nama Perusahaan</label>
                <input type="text" name="nama_perusahaan" class="form-control w-full"
                    value="{{ old('nama_perusahaan', $riwayat->nama_perusahaan) }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Posisi</label>
                <input type="text" name="posisi" class="form-control w-full"
                    value="{{ old('posisi', $riwayat->posisi) }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Lokasi</label>
                <input type="text" name="lokasi" class="form-control w-full"
                    value="{{ old('lokasi', $riwayat->lokasi) }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" class="form-control w-full"
                    value="{{ old('tanggal_mulai', $riwayat->tanggal_mulai) }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Tanggal Berakhir</label>
                <input type="date" name="tanggal_berakhir" class="form-control w-full"
                    value="{{ old('tanggal_berakhir', $riwayat->tanggal_berakhir) }}">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
