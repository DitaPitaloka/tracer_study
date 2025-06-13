@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Detail Alumni</h2>

    <div class="bg-white p-6 rounded shadow-md">
        <ul class="space-y-3">
            @if($alumni->foto)
            <li>
                <strong>Foto:</strong><br>
                <img src="{{ asset('storage/' . $alumni->foto) }}" alt="Foto" class="h-32 w-32 object-cover rounded">
            </li>
            @endif
            <li><strong>Nama:</strong> {{ $alumni->nama }}</li>
            <li><strong>NIM:</strong> {{ $alumni->nim }}</li>
            <li><strong>Prodi:</strong> {{ $alumni->prodi }}</li>
            <li><strong>Tahun Lulus:</strong> {{ $alumni->tahun_lulus }}</li>
            <li><strong>Email:</strong> {{ $alumni->email }}</li>
            <li><strong>No HP:</strong> {{ $alumni->no_hp }}</li>
        </ul>

        <div class="mt-6">
            <a href="{{ route('alumni.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded">← Kembali</a>
        </div>
    </div>
@endsection
