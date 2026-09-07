@extends('layout')

@section('content')
    <div class="bg-white rounded-2xl shadow p-8 md:col-span-4 text-center">

        <h1 class="text-9xl font-extrabold text-indigo-600">429</h1>

        <p class="text-2xl font-semibold text-gray-700 mt-4">
            Muitas Solicitações
        </p>

        <p class="text-gray-500 mt-2">
            Aguarde 1 minuto para tentar novamente.
        </p>

        <a
            href="{{ route('home.index') }}"
            class="mt-8 inline-block bg-indigo-600 text-white px-8 py-3 rounded-xl shadow hover:bg-indigo-700 transition">
            Voltar para a Home
        </a>

    </div>
@endsection
