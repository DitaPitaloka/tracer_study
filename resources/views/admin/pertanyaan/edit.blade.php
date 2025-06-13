@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Edit Pertanyaan</h2>

    <div class="bg-white p-6 rounded shadow-md">
        <form action="{{ route('pertanyaan.update', $pertanyaan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700">Pertanyaan</label>
                <input type="text" name="pertanyaan" value="{{ $pertanyaan->pertanyaan }}" class="form-control w-full" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Pilih Grup Kuesioner</label>
                <select name="grup_id" class="form-control w-full" required>
                    <option value="">Pilih Grup</option>
                    @foreach($grupKuesioners as $grup)
                        <option value="{{ $grup->id }}" {{ $pertanyaan->grup_id == $grup->id ? 'selected' : '' }}>
                            {{ $grup->nama_grup }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
