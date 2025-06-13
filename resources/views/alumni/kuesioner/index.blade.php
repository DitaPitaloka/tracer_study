@extends('layouts.alumni')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Isi Kuesioner</h2>

    <form method="POST" action="{{ route('alumni.kuesioner.store') }}">
        @csrf

        @foreach ($pertanyaan as $item)
            <div class="mb-4">
                <label class="block font-semibold">{{ $item->pertanyaan }}</label>
                <input type="text" name="jawaban[{{ $item->id }}]" class="form-control w-full" required>
            </div>
        @endforeach

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Kirim Kuesioner
        </button>
    </form>
@endsection
