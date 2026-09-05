@extends('layout')

@section('content')

    <div class="md:col-span-3 flex justify-center items-center">
        <div class="w-full max-w-2xl bg-white rounded-2xl shadow p-8 space-y-8">

            {{-- Formulário de Cadastro do Usuário --}}
            <form action="{{ route('user.store') }}" method="POST" class="space-y-4">
                @csrf
                <h2 class="text-2xl font-semibold text-gray-800 border-b pb-2 text-center">
                    Cadastro de Usuário
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700">Primeiro Nome</label>
                        <input type="text" id="first_name" name="firstName" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-200" value="{{ old('firstName') }}" placeholder="Seu Primeiro Nome">
                        @error('firstName')
                        <span class="text-red-500 italic text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Último Nome</label>
                        <input type="text" id="last_name" name="lastName" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-200" value="{{ old('lastName') }}"  placeholder="Seu Último Nome">
                        @error('lastName')
                        <span class="text-red-500 italic text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="text" id="email" name="email" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-200" placeholder="Seu email" value="{{ old('email') }}" >
                    @error('email')
                    <span class="text-red-500 italic text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                    <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-200" placeholder="Sua Senha">
                    @error('password')
                    <span class="text-red-500 italic text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition cursor-pointer">
                    Cadastrar
                </button>
            </form>
        </div>
    </div>

@endsection
