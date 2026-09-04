@extends('layout')

@section('content')

    <div class="md:col-span-3 grid md:grid-cols-3 gap-8 w-full">
        <!-- Coluna de aulas -->
        <aside class="order-2 md:order-1 md:col-span-1">
            <div class="bg-white rounded-2xl shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Aulas do Curso</h3>
                <ul class="space-y-3 text-gray-700">
                    <li>
                        <a href="{{ route('lesson.index') }}" class="flex items-center gap-2 hover:text-indigo-600">
                            <span class="text-sm">1.</span> Introdução ao Curso
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 hover:text-indigo-600">
                            <span class="text-sm">2.</span> Configurando o Ambiente
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 hover:text-indigo-600">
                            <span class="text-sm">3.</span> Roteamento no Laravel
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 hover:text-indigo-600">
                            <span class="text-sm">4.</span> Controllers e Views
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 hover:text-indigo-600">
                            <span class="text-sm">5.</span> Introdução ao Eloquent
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- Card principal do curso -->
        <div class="order-1 md:order-2 md:col-span-2">
            <div class="bg-white rounded-2xl shadow overflow-hidden">
                <img
                    src="{{ url('storage/images/course-image.png') }}"
                    alt="Imagem do curso"
                    class="w-full h-60 object-cover"
                >
                <div class="p-8">
                    <h1 class="text-3xl font-bold mb-3 text-gray-900">Bootcamp Laravel do Zero ao Avançado</h1>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        Aprenda Laravel de forma prática construindo projetos reais. Neste bootcamp,
                        você vai dominar Eloquent ORM, Blade, rotas, autenticação, APIs e muito mais!
                    </p>

                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Acesso vitalício</p>
                            <p class="text-3xl font-semibold text-green-600 mt-1">R$ 199,00</p>
                        </div>
                        <a href="{{ route('checkout.index') }}"
                           class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-xl hover:bg-indigo-700 transition"
                        >
                            Comprar Curso
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
