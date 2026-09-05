@extends('layout')

@section('content')
    <div class="md:col-span-3 flex justify-center items-center">
        <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md">
            <h1 class="text-3xl font-bold text-center mb-6">Alterar sua senha</h1>

            @if ($errors->has('errors'))
                <div class="bg-red-600 text-white text-center p-2 mb-3 rounded">{{ $errors->first('errors') }}</div>
            @endif

            <form method="POST" action="{{ route('forgot-password.update') }}" class="space-y-5">
                @csrf
                @method('PUT')
                <input type="hidden" name="token" value="{{ $token }}">
                <div>
                    <label for="email" class="block text-sm font-medium mb-1">E-mail</label>
                    <input
                        id="email"
                        name="email"
                        type="text"
                        value="{{ old('email') }}"
                        autofocus
                        class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-indigo-500"
                        placeholder="seu@email.com"
                    >
                    @error('email')
                    <p class="text-red-500 text-sm mt-1 italic">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Senha -->
                <div class="mb-1">
                    <label for="password" class="block text-sm font-medium mb-1">Senha</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-indigo-500"
                        placeholder="••••••••"
                    >
                    @error('password')
                    <p class="text-red-500 text-sm mt-1 italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-1">
                    <label for="password" class="block text-sm font-medium mb-1">Confirme a Senha</label>
                    <input
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-indigo-500"
                        placeholder="••••••••"
                    >
                    @error('password_confirmation')
                    <p class="text-red-500 text-sm mt-1 italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Botão -->
                <button
                    type="submit"
                    class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors mt-1 cursor-pointer"
                >
                    Resetar senha
                </button>
            </form>

        </div>
    </div>
@endsection
