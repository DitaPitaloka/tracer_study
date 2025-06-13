@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Edit Data Alumni</h2>

    <div class="bg-white p-6 rounded shadow-md">
        <form method="POST" action="{{ route('alumni.update', $alumni->id)}} "enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700">Nama</label>
                <input type="text" name="nama" value="{{ $alumni->nama }}" class="form-control w-full" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">NIM</label>
                <input type="text" name="nim" value="{{ $alumni->nim }}" class="form-control w-full" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Prodi</label>
                <select name="prodi" class="form-control w-full" required>
                    <option value="Teknologi Informasi" {{ $alumni->prodi == 'Teknologi Informasi' ? 'selected' : '' }}>Teknologi Informasi</option>
                    <option value="Teknik Sipil" {{ $alumni->prodi == 'Teknik Sipil' ? 'selected' : '' }}>Teknik Sipil</option>
                    <option value="Budidaya Tanaman Perkebunan" {{ $alumni->prodi == 'Budidaya Tanaman Perkebunan' ? 'selected' : '' }}>Budidaya Tanaman Perkebunan</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Tahun Lulus</label>
                <input type="number" name="tahun_lulus" value="{{ $alumni->tahun_lulus }}" class="form-control w-full" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" value="{{ $alumni->email }}" class="form-control w-full" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">No HP</label>
                <input type="text" name="no_hp" value="{{ $alumni->no_hp }}" class="form-control w-full" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Foto</label>
                <input type="file" name="foto" accept="image/*" class="form-control w-full">
                @if($alumni->foto)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $alumni->foto) }}" alt="Foto lama" class="h-20 w-20 object-cover rounded">
                        <p class="text-sm text-gray-500 italic">Foto saat ini</p>
                    </div>
                @endif
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Update Data</button>
            </div>
        </form>
    </div>
@endsection
