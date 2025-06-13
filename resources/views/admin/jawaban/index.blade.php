@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Jawaban Kuesioner Alumni</h2>

    @foreach ($alumni as $alum)
        <div class="bg-white p-6 rounded shadow-md mb-6">
            <h3 class="text-lg font-semibold mb-3">👤 {{ $alum->name }}</h3>

            @if ($alum->jawabanKuesioner->count())
                <ul class="list-disc ml-6 space-y-2">
                    @foreach ($alum->jawabanKuesioner as $jawaban)
                        <li>
                            <strong>{{ $jawaban->pertanyaan->pertanyaan }}</strong><br>
                            Jawaban: {{ $jawaban->jawaban }}
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500 italic">Belum mengisi kuesioner.</p>
            @endif
        </div>
    @endforeach
@endsection
