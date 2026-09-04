@extends('layout')

@section('content')

    <div class="bg-white rounded-2xl shadow p-8 md:col-span-3">
        <h1 class="text-3xl font-bold mb-6">Entre em Contato</h1>
        <p class="text-gray-600 mb-8">
            Tem alguma dúvida, sugestão ou problema? Envie uma mensagem e entraremos em contato o mais breve possível.
        </p>

        <form class="space-y-6 max-w-lg">
            <div>
                <label class="block text-sm font-medium mb-1">Nome completo</label>
                <input
                    type="text"
                    class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-indigo-500"
                    placeholder="Seu nome"
                >
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">E-mail</label>
                <input
                    type="email"
                    class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-indigo-500"
                    placeholder="seu@email.com"
                >
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Mensagem</label>
                <textarea
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
