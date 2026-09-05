@extends('layout')

@section('fullwidth')
    <div class="max-w-3xl mx-auto mt-10 p-6 bg-white shadow-lg rounded-xl">

        <h1 class="text-2xl font-bold text-indigo-600 mb-6 text-center">
            Recuperar Senha
        </h1>

        <p class="text-gray-600 text-center mb-8">
            Informe seu e-mail para receber o link de redefinição da senha.
        </p>

        @session('sent')
        <div class="bg-green-600 text-white text-center p-2 mb-3 rounded">{{ $value }}</div>
        @endsession

        @if ($errors->has('errors'))
            <div class="bg-red-600 text-white text-center p-2 mb-3 rounded">{{ $errors->first('errors') }}</div>
        @endif

        <form action="{{ route('forgot-password.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block font-semibold mb-1" for="email">E-mail</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
                    required
                    class="w-full p-3 border rounded-lg focus:ring focus:ring-indigo-300"
                    placeholder="seuemail@exemplo.com"
                >
                @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button
                type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white p-3 rounded-lg font-semibold transition cursor-pointer"
            >
                Enviar Link de Recuperação
            </button>
        </form>

    </div>
@endsection
