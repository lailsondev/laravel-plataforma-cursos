@extends('layout')

@section('content')

    <div class="md:col-span-4 grid md:grid-cols-4 gap-8 w-full">
        <!-- Coluna de aulas -->
        <aside class="order-2 md:order-1 md:col-span-2">
            <div class="bg-white rounded-2xl shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Aulas do Curso</h3>
                <ul class="space-y-3 text-gray-700">
                    <x-lessons :canAccess="$canAccess" :course="$course"/>
                </ul>
            </div>
        </aside>

        <!-- Card principal do curso -->
        <div class="order-1 md:order-2 md:col-span-2">
            <div class="bg-white rounded-2xl shadow overflow-hidden">
                <img
                    src="{{ url($course->image) }}"
                    alt="{{ $course->title }}"
                    class="w-full h-60 object-cover"
                >
                <div class="p-8">
                    <h1 class="text-3xl font-bold mb-3 text-gray-900">{{ $course->title }}</h1>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        {{ $course->description }}
                    </p>

                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Acesso vitalício</p>
                            <p class="text-3xl font-semibold text-green-600 mt-1">{{ Number::currency($course->price, 'BRL') }}</p>
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
