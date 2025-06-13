<!-- resources/views/pertanyaan/index.blade.php -->
@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Daftar Pertanyaan Kuesioner</h2>

    <div class="mb-4">
        <a href="{{ route('pertanyaan.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
            Tambah Pertanyaan
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4 flex flex-wrap gap-2">
        @foreach($grupKuesioners as $grup)
            <a href="{{ route('pertanyaan.index', ['grup' => $grup->id]) }}"
            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                {{ $grup->nama_grup }}
            </a>
        @endforeach
    </div>

    <div class="bg-white p-6 rounded shadow-md">
        <table class="table-auto w-full">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Pertanyaan</th>
                    <th class="px-4 py-2">Grup Kuesioner</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pertanyaans as $index => $item)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2">{{ $item->pertanyaan }}</td>
                        <td class="px-4 py-2">
                            {{ $item->grupKuesioner?->nama_grup ?? '-' }}
                        </td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('pertanyaan.edit', $item->id) }}" class="text-yellow-600 hover:text-yellow-800">
                                <i class="fas fa-pen"></i>
                            </a>
                            <form action="{{ route('pertanyaan.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus pertanyaan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-2 text-center text-gray-500">Belum ada pertanyaan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
