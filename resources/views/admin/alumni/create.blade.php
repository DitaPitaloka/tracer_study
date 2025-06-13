@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Tambah Data Alumni</h2>

    <div class="bg-white p-6 rounded shadow-md">
        <form method="POST" action="{{ route('alumni.store')}} " enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700">Nama</label>
                <input type="text" name="nama" class="form-control w-full" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">NIM</label>
                <input type="text" name="nim" class="form-control w-full" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Prodi</label>
                <select name="prodi" class="form-control w-full" required>
                    <option value="">-- Pilih Prodi --</option>
                    <option value="Teknologi Informasi">Teknologi Informasi</option>
                    <option value="Teknik Sipil">Teknik Sipil</option>
                    <option value="Budidaya Tanaman Perkebunan">Budidaya Tanaman Perkebunan</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Tahun Lulus</label>
                <input type="number" name="tahun_lulus" class="form-control w-full" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" class="form-control w-full" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">No HP</label>
                <input type="text" name="no_hp" class="form-control w-full" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Foto</label>
                <input type="file" name="foto" accept="image/*" class="form-control w-full">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan Data</button>
            </div>
        </form>
    </div>
@endsection
