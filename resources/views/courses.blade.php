@extends('layout')

@section('content')

    <div class="md:col-span-3">
        <h1 class="text-3xl font-bold mb-8">Meus Cursos</h1>

        @php
            $courses = [
              ['title' => 'Laravel Completo', 'description' => 'Aprenda Laravel do zero ao avançado com projetos reais.', 'image' => asset('storage/images/course-image.png')],
              ['title' => 'TailwindCSS na Prática', 'description' => 'Crie interfaces modernas e responsivas com Tailwind.', 'image' => 'https://images.unsplash.com/photo-1581276879432-15a19d654956'],
              ['title' => 'Livewire Masterclass', 'description' => 'Desenvolva aplicações dinâmicas sem usar JavaScript.', 'image' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085'],
            ];
        @endphp

        <div class="grid md:grid-cols-3 gap-6">
            @foreach ($courses as $course)
                <div class="bg-white rounded-2xl shadow overflow-hidden">
                    <img src="{{ $course['image'] }}" alt="{{ $course['title'] }}" class="w-full h-40 object-cover">
                    <div class="p-5">
                        <h2 class="text-xl font-semibold mb-2">{{ $course['title'] }}</h2>
                        <p class="text-gray-600 text-sm mb-4">{{ $course['description'] }}</p>
                        <a
                            href="#"
                            class="inline-block bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-indigo-700"
                        >
                            Acessar curso
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
