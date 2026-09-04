@extends('layout')

@section('content')

    <div class="col-span-3">
        <div class="bg-white rounded-2xl shadow p-8 max-w-3xl mx-auto">
            <h2 class="text-3xl font-bold mb-6 text-center">Finalizar Compra</h2>
            <p class="text-gray-600 mb-8 text-center">
                Curso selecionado: <strong>Laravel Completo</strong>
            </p>

            <!-- Dados do comprador -->
            <form class="space-y-6">
                <div>
                    <label class="block text-sm font-medium mb-1">Nome completo</label>
                    <input type="text" class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-indigo-500">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">E-mail</label>
                    <input type="email" class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-indigo-500">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Forma de pagamento</label>
                    <select class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-indigo-500">
                        <option>Cartão de crédito</option>
                        <option>Boleto bancário</option>
                        <option>Pix</option>
                    </select>
                </div>

                <button
                    type="submit"
                    class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 transition"
                >
                    Comprar agora
                </button>
            </form>
        </div>
    </div>

@endsection
