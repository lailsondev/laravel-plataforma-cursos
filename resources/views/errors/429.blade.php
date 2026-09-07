@extends('layout')

@section('content')
    <div class="bg-white rounded-2xl shadow p-8 md:col-span-4 text-center">

        <h1 class="text-9xl font-extrabold text-indigo-600">403</h1>

        <p class="text-2xl font-semibold text-gray-700 mt-4">
            Essa ação não é autorizada
        </p>

        <p class="text-gray-500 mt-2">
            Você não tem permissão para acessar essa página.
        </p>

        <a
            href="{{ route('home.index') }}"
            class="mt-8 inline-block bg-indigo-600 text-white px-8 py-3 rounded-xl shadow hover:bg-indigo-700 transition">
            Voltar para a Home
        </a>

    </div>
@endsection
