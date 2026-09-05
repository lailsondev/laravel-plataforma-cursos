@extends('layout')

@section('content')

    <div class="md:col-span-3">
        <div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-4">
            <h2 class="text-4xl text-indigo-600">Verifique seu email</h2>

            @session('success')
            <div class="bg-green-700 text-center text-white p-2 rounded mb-3 mt-3">{{ $value }}</div>
            @endsession

            <p>Quando se cadastrou recebeu um email para ativar sua conta, caso não tenha recebido, clique no botão abaixo.</p>

            <form action="{{route('verification.send')}}" method="post">
                @csrf
                <button type="submit" class="bg-green-600 text-center text-white hover:bg-green-400 p-2 mt-3 cursor-pointer rounded">Reenviar email</button>
            </form>
        </div>
    </div>

@endsection
