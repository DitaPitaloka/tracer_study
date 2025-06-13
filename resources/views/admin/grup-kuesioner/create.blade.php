@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold mb-6">Tambah Grup Kuesioner</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('grup-kuesioner.store') }}" method="POST">
    @csrf
    <div class="mb-4">
        <label for="nama_grup" class="block text-sm font-medium text-gray-700">Nama Grup</label>
        <input type="text" name="nama_grup" id="nama_grup" required
            class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div class="mb-4">
        <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
        <input type="text" name="deskripsi" id="deskripsi" required
            class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div class="mb-4">
        <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
        <input type="date" name="tanggal_mulai" id="tanggal_mulai" required
            class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div class="mb-4">
        <label for="tanggal_berakhir" class="block text-sm font-medium text-gray-700">Tanggal Berakhir</label>
        <input type="date" name="tanggal_berakhir" id="tanggal_berakhir" required
            class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>
    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
        Simpan
    </button>
</form>
</div>
@endsection
