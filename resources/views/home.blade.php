@extends('layout')

@section('content')
    <div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-4">
        <img src="https://placehold.co/600x400" class="rounded-xl mb-4" alt="">
        <h2 class="text-lg font-semibold mb-2">Curso Laravel para Iniciantes</h2>
        <p class="text-gray-600 text-sm line-clamp-3 mb-4">
            Aprenda Laravel do zero e construa aplicações modernas com PHP.
        </p>
        <div class="flex items-center justify-between">
            <span class="font-bold text-indigo-600">R$ 97,00</span>
            <a href="{{ route('course.index') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700">Ver mais</a>
        </div>
    </div>
@endsection
