@extends('layouts.alumni')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Tambah Riwayat Pekerjaan</h2>

    <div class="bg-white p-6 rounded shadow-md">
        <form method="POST" action="{{ route('alumni.riwayat.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700">Nama Perusahaan</label>
                <input type="text" name="nama_perusahaan" class="form-control w-full" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Posisi</label>
                <input type="text" name="posisi" class="form-control w-full" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Lokasi</label>
                <input type="text" name="lokasi" class="form-control w-full" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" class="form-control w-full" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Tanggal Berakhir</label>
                <input type="date" name="tanggal_berakhir" class="form-control w-full">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
