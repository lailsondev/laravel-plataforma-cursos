@extends('layout')

@section('content')

    <div class="md:col-span-4">
        <h1 class="text-3xl font-bold mb-8">Meus Cursos ({{ $courses->total() }})</h1>

        <div class="grid md:grid-cols-3 gap-6">
            @forelse ($courses as $course)
                <div class="bg-white rounded-2xl shadow overflow-hidden">
                    <img src="{{ $course['image'] }}" alt="{{ $course['title'] }}" class="w-full h-40 object-cover">
                    <div class="p-5">
                        <h2 class="text-xl font-semibold mb-2">{{ $course['title'] }}</h2>
                        <p class="text-gray-600 text-sm mb-4">{{ $course['description'] }}</p>
                        <a
                            href="{{ route('course.show', $course->slug) }}"
                            class="inline-block bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-indigo-700"
                        >
                            Acessar curso
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-red-500 text-white text-center rounded p-2">
                    Você ainda não tem nenhum curso!
                </div>
            @endforelse
        </div>
        <div class="flex justify-center mt-10">
            {{ $courses->links() }}
        </div>
    </div>

@endsection
