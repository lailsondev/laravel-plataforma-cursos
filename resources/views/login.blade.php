@extends('layout')

@section('content')

    <div class="md:col-span-3 flex justify-center items-center">
        <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md">
            <h1 class="text-3xl font-bold text-center mb-6">Entrar na sua conta</h1>

            <form method="POST" action="{{ route('logar.store') }}" class="space-y-5">
                <!-- E-mail -->
                <div>
                    <label for="email" class="block text-sm font-medium mb-1">E-mail</label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-indigo-500"
                        placeholder="seu@email.com"
                    >
                </div>

                <!-- Senha -->
                <div class="mb-1">
                    <label for="password" class="block text-sm font-medium mb-1">Senha</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        required
                        class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-indigo-500"
                        placeholder="••••••••"
                    >
                </div>

                <!-- Lembrar login -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="remember" class="text-indigo-600 rounded">
                        <span class="text-sm text-gray-600">Lembrar-me</span>
                    </label>
                    <a href="#" class="text-sm text-indigo-600 hover:underline">
                        Esqueci minha senha
                    </a>
                </div>

                <!-- Botão -->
                <button
                    type="submit"
                    class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors mt-1"
                >
                    Entrar
                </button>
            </form>

            <!-- Cadastro -->
            <p class="text-sm text-center text-gray-600 mt-6">
                Ainda não tem conta?
                <a href="#" class="text-indigo-600 hover:underline font-medium">
                    Cadastre-se
                </a>
            </p>
        </div>
    </div>

@endsection
