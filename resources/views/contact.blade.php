@extends('layout')

@section('content')

    <div class="bg-white rounded-2xl shadow p-8 md:col-span-3 max-w-3xl mx-auto w-full">
        <h1 class="text-3xl font-bold mb-6">Entre em Contato</h1>
        <p class="text-gray-600 mb-8">
            Tem alguma dúvida, sugestão ou problema? Envie uma mensagem e entraremos em contato o mais breve possível.
        </p>

        @session('success')
            <p class="bg-green-600 text-white p-2 rounded mb-4 text-center">
                {{ $value }}
            </p>
        @endsession

        <form class="space-y-6 max-w-lg mx-auto" action="{{ route('contact.store') }}" method="post">
            @csrf
            <div>
                <label class="block text-sm font-medium mb-1">Nome completo</label>
                @error('name')
                <p class="text-red-600 italic">
                    {{ $message }}
                </p>
                @enderror
                <input
                    name="name"
                    type="text"
                    class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-indigo-500"
                    placeholder="Seu nome"
                    value="{{ old('name') }}"
                >
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">E-mail</label>
                @error('email')
                <p class="text-red-600 italic">
                    {{ $message }}
                </p>
                @enderror
                <input
                    name="email"
                    type="email"
                    class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-indigo-500"
                    placeholder="seu@email.com"
                    value="{{ old('email') }}"
                >
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Mensagem</label>
                @error('message')
                <p class="text-red-600 italic">
                    {{ $message }}
                </p>
                @enderror
                <textarea
                    name="message"
                    rows="5"
                    class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-indigo-500"
                    placeholder="Escreva sua mensagem aqui..."
                ></textarea>
            </div>

            <button
                type="submit"
                class="bg-indigo-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-indigo-700"
            >
                Enviar mensagem
            </button>
        </form>
    </div>

@endsection
