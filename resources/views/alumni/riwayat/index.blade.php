@extends('layouts.alumni')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Riwayat Pekerjaan</h2>

    <a href="{{ route('alumni.riwayat.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded mb-4 inline-block">
        Tambah Riwayat
    </a>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white p-6 rounded shadow-md">
        @if ($riwayats->count())
            <table class="table-auto w-full">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 text-left">Nama Perusahaan</th>
                        <th class="px-4 py-2 text-left">Posisi</th>
                        <th class="px-4 py-2 text-left">Lokasi</th>
                        <th class="px-4 py-2 text-left">Periode</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($riwayats as $item)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $item->nama_perusahaan }}</td>
                            <td class="px-4 py-2">{{ $item->posisi }}</td>
                            <td class="px-4 py-2">{{ $item->lokasi }}</td>
                            <td class="px-4 py-2">
                                {{ \Carbon\Carbon::parse($item->tanggal_mulai)->translatedFormat('d F Y') }}
                                -
                                {{ $item->tanggal_berakhir ? \Carbon\Carbon::parse($item->tanggal_berakhir)->translatedFormat('d F Y') : 'Sekarang' }}
                            </td>
                            <td class="px-4 py-2 space-x-2">
                                <a href="{{ route('alumni.riwayat.edit', $item->id) }}" class="text-yellow-500 hover:text-yellow-700">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <form action="{{ route('alumni.riwayat.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 bg-transparent border-none p-0">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-gray-600">Belum ada data riwayat pekerjaan.</p>
        @endif
    </div>
@endsection
