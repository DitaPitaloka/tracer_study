@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Tambah Pertanyaan Kuesioner</h2>

    <div class="bg-white p-6 rounded shadow-md">
        <form action="{{ route('pertanyaan.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Pertanyaan</label>
                <input type="text" name="pertanyaan" class="form-control w-full" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Pilih Grup Kuesioner</label>
                <select name="grup_id" class="form-control w-full" required>
                    <option value="">Pilih Grup</option>
                    @foreach($grupKuesioners as $grup)
                        <option value="{{ $grup->id }}">{{ $grup->nama_grup }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
