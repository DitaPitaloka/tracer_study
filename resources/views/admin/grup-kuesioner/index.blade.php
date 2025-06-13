@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Daftar Grup Kuesioner</h2>

    <div class="mb-4">
        <a href="{{ route('grup-kuesioner.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Tambah Grup Kuesioner
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white p-6 rounded shadow-md">
        <table class="table-auto w-full">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Nama Grup</th>
                    <th class="px-4 py-2">Deskripsi</th>
                    <th class="px-4 py-2">Tanggal Mulai</th>
                    <th class="px-4 py-2">Tanggal Berakhir</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($grupKuesioner as $index => $grup)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2">{{ $grup->nama_grup }}</td>
                        <td class="px-4 py-2">{{ $grup->deskripsi }}</td>
                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($grup->tanggal_mulai)->format('d-m-Y') }}</td>
                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($grup->tanggal_berakhir)->format('d-m-Y') }}</td>
                        <td class="px-4 py-2">
                            <div class="flex items-center space-x-3">
                                <!-- Tombol Edit -->
                                <a href="{{ route('grup-kuesioner.edit', $grup->id) }}" class="inline-flex items-center text-sm text-yellow-600 hover:text-yellow-800">
                                    <i class="fas fa-pen mr-1"></i> Edit
                                </a>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('grup-kuesioner.destroy', $grup->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus grup kuesioner ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center text-sm text-red-600 hover:text-red-800">
                                        <i class="fas fa-trash mr-1"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-2 text-center text-gray-500">Belum ada grup kuesioner.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
