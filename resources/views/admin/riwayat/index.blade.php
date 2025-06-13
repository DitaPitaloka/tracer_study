@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Riwayat Pekerjaan Alumni</h2>

    <div class="bg-white p-6 rounded shadow-md">
        <table class="table-auto w-full">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">Nama Alumni</th>
                    <th class="px-4 py-2">Perusahaan</th>
                    <th class="px-4 py-2">Posisi</th>
                    <th class="px-4 py-2">Lama Bekerja</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($riwayats as $item)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $item->user->name ?? 'Tidak diketahui' }}</td>
                        <td class="px-4 py-2">{{ $item->nama_perusahaan }}</td>
                        <td class="px-4 py-2">{{ $item->posisi }}</td>
                        <td class="px-4 py-2">
                                {{ \Carbon\Carbon::parse($item->tanggal_mulai)->translatedFormat('d F Y') }}
                                -
                                {{ $item->tanggal_berakhir ? \Carbon\Carbon::parse($item->tanggal_berakhir)->translatedFormat('d F Y') : 'Sekarang' }}
                            </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-gray-600">Belum ada data riwayat pekerjaan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
