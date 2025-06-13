@extends('layouts.alumni')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Edit Riwayat Pekerjaan</h2>

    <form method="POST" action="{{ route('alumni.riwayat.update', $riwayat->id) }}" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block">Nama Perusahaan</label>
            <input type="text" name="nama_perusahaan" value="{{ $riwayat->nama_perusahaan }}" class="form-control w-full" required>
        </div>

        <div class="mb-4">
            <label class="block">Posisi</label>
            <input type="text" name="posisi" value="{{ $riwayat->posisi }}" class="form-control w-full" required>
        </div>

        <div class="mb-4">
            <label class="block">Lama Bekerja</label>
            <input type="text" name="lama_bekerja" value="{{ $riwayat->lama_bekerja }}" class="form-control w-full" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Perubahan</button>
    </form>
@endsection
